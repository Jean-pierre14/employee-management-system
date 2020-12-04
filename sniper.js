$(document).ready(function () {
    count()
    countM()
    countF()
    countL()
    countFe()
    countPr()
    projects()
})


// All

function projects() {
    let action = "projects"
    $.ajax({
        url: './sniper.php',
        method: 'POST',
        data: { action },
        success: function (data) {
            $('#projects').html(data)
        }
    })
}
function countPr() {
    let action = "allPr"
    $.ajax({
        url: './sniper.php',
        method: 'POST',
        data: { action },
        success: function (data) {
            $('#total-employees-pr').html(data)
        }
    })
}
function countFe() {
    let action = "allFe"
    $.ajax({
        url: './sniper.php',
        method: 'POST',
        data: { action },
        success: function (data) {
            $('#total-employees-fe').html(data)
        }
    })
}
function countL() {
    let action = "allL"
    $.ajax({
        url: './sniper.php',
        method: 'POST',
        data: { action },
        success: function (data) {
            $('#total-employees-l').html(data)
        }
    })
}
function count() {
    let action = "all"
    $.ajax({
        url: './sniper.php',
        method: 'POST',
        data: { action },
        success: function (data) {
            $('#total-employees').html(data)
        }
    })
}
function countM() {
    let action = "allM"
    $.ajax({
        url: './sniper.php',
        method: 'POST',
        data: { action },
        success: function (data) {
            $('#total-employees-m').html(data)
        }
    })
}
function countF() {
    let action = "allF"
    $.ajax({
        url: './sniper.php',
        method: 'POST',
        data: { action },
        success: function (data) {
            $('#total-employees-f').html(data)
        }
    })
}