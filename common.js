const empSummaryNew = "Новий працівник";
const empSummaryNothing = "()";

var selId = -1;
var roleNAIndexKey = -1;
var roleNAIndexVal = 0;
var roleMap = new Array();

var familyNameOld = "";
var givenNameOld = "";
var roleOld = -1;

function makeRoleMap() {
    // Do not call after start. Better from rowClick().
    var opts = document.getElementById("role-modify-sel")
            .getElementsByTagName("option");
    
    for (var i = 0; i < opts.length; i++) {
        if (+opts[i].dataset.role == roleNAIndexKey) {
            roleNAIndexVal = i;
        } else {
            roleMap[+opts[i].dataset.role] = i;
        }
    }
}

function getSelectedRow() {
    var selRowArray = document.getElementsByClassName("sel-row");
    var selRow;
    if (selRowArray.length > 0) {
        selRow = selRowArray[0];
    }
    return selRow;
}

function deselectRow() {
    var selRowArray = document.getElementsByClassName("sel-row");
    var selRowB4 = getSelectedRow();
    if (selRowB4) {
        selRowB4.classList.remove("sel-row");
        selRowB4.getElementsByTagName("input")[0].checked = false;
    }
}

function selectRowByRadio(radio) {
    var elm = radio.parentNode.parentNode;
    
    if (document.getElementById("add-emp").style.display != "none") {
        deselectRow();
        
        selId = elm.dataset.id;
        elm.classList.add("sel-row");
        
        var btns = document.getElementsByClassName("row-modify-btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].disabled = false;
        }
        
        var givenName = elm.getElementsByClassName("given-td")[0].innerHTML;
        var familyName = elm.getElementsByClassName("family-td")[0].innerHTML;
        var roleTd0 = elm.getElementsByClassName("role-td")[0];
        
        document.getElementById("given-name").value = givenName;
        document.getElementById("family-name").value = familyName;
        var role = +roleTd0.dataset.role;
        
        familyNameOld = familyName;
        givenNameOld = givenName;
        roleOld = role;
        
        if (roleMap.length < 1) {
            makeRoleMap();
        }
        
        var roleModifySel = document.getElementById("role-modify-sel");
        if (role == roleNAIndexKey) {
            roleModifySel.selectedIndex = roleNAIndexVal;
        } else {
            roleModifySel.selectedIndex = roleMap[role];
        }
        
        var empSummary = document.getElementById("emp-summary");
        empSummary.innerHTML = givenName + " " + familyName + ", "
                + roleTd0.innerHTML;
    } else {
        radio.checked = false;
    }
}

function addEmployee() {
    document.getElementById("given-name").value = "";
    document.getElementById("family-name").value = "";
    document.getElementById("role-modify-sel").selectedIndex = roleNAIndexVal;
    
    deselectRow();
    var btns = document.getElementsByClassName("row-modify-btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].disabled = true;
        btns[i].style.display = "none";
    }
    document.getElementById("emp-summary").innerHTML = empSummaryNew;
    
    document.getElementById("add-emp-yes").style.display = "inline-block";
    document.getElementById("add-emp-no").style.display = "inline-block";
    document.getElementById("add-emp").style.display = "none";
}

function addEmployeeNo() {
    var btns = document.getElementsByClassName("row-modify-btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].style.display = "inline-block";
    }
    
    document.getElementById("add-emp-yes").style.display = "none";
    document.getElementById("add-emp-no").style.display = "none";
    document.getElementById("add-emp").style.display = "inline-block";
    
    document.getElementById("emp-summary").innerHTML = empSummaryNothing;
}

function addEmployeeYes() {
    
    addEmployeeNo();
}

function modifyEmployee() {
    var selRow = getSelectedRow();
    
    var givenNameOld = selRow.getElementsByClassName("given-td")[0].innerHTML;
    var familyNameOld = selRow.getElementsByClassName("family-td")[0].innerHTML;
    var roleOld = selRow.getElementsByClassName("role-td")[0].dataset.role;
    
    var givenName = document.getElementById("given-name").value;
    var familyName = document.getElementById("family-name").value;
    var roleModifySel = document.getElementById("role-modify-sel");
    var opts = roleModifySel.getElementsByTagName("option");
    var role = opts[roleModifySel.selectedIndex].dataset.role;
    
    var goOn = true;
    if (givenName == "" || familyName == "") {
        goOn = false;
        alert("Ім'я і прізвище мають бути заповнені.");
    }
    
    if (goOn === true) {
        if (givenName == givenNameOld && familyName == familyNameOld
                && role == roleOld) {
            goOn = false;
            alert("Ви не внесли ніяких змін.");
        }
    }
    
    if (goOn === true) {
        ;
    }
}

function deleteEmployee() {
    if (confirm("Працівник: "
            + document.getElementById("emp-summary").innerHTML + "\n"
            + "Видалити з бази даних?")) {
        var formData = new FormData();
        formData.set("id", document.getElementsByClassName("sel-row")[0].dataset.id);
        
        var request = new XMLHttpRequest();
        
        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                refreshEmployees();
            }
        }
        
        request.open("POST", "employee-delete.php", true);
        request.send(formData);
    }
}

function refreshEmployees() {
    var request = new XMLHttpRequest();
    
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            document.getElementById("emp-tbody").innerHTML = request.responseText;
            
            var btns = document.getElementsByClassName("row-modify-btn");
            for (var i = 0; i < btns.length; i++) {
                btns[i].disabled = true;
            }
            
            document.getElementById("emp-summary").innerHTML = empSummaryNew;
            document.getElementById("given-name").value = "";
            document.getElementById("family-name").value = "";
            document.getElementById("role-modify-sel").selectedIndex = roleNAIndexVal;
        }
    }
    
    request.open("GET", "employees-all.php", true);
    request.send();
}

