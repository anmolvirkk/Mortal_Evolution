var exercises = [{
    category: 'chest',
    name: 'bench press',
    data: []
  },
  {
    category: 'chest',
    name: 'chest flyes',
    data: []
  },
  {
    category: 'chest',
    name: 'chest press',
    data: []
  },
  {
    category: 'chest',
    name: 'cable crossover',
    data: []
  },
  {
    category: 'chest',
    name: 'pec dec',
    data: []
  },
  {
    category: 'chest',
    name: 'dips',
    data: []
  },
  {
    category: 'back',
    name: 'deadlifts',
    data: []
  },
  {
    category: 'back',
    name: 'barbell rows',
    data: []
  },
  {
    category: 'back',
    name: 't-bar rows',
    data: []
  },
  {
    category: 'back',
    name: 'cable rows',
    data: []
  },
  {
    category: 'back',
    name: 'lat pull downs',
    data: []
  },
  {
    category: 'shoulders',
    name: 'overhead press',
    data: []
  },
  {
    category: 'shoulders',
    name: 'lateral raises',
    data: []
  },
  {
    category: 'shoulders',
    name: 'lateral raises',
    data: []
  },
  {
    category: 'shoulders',
    name: 'front raises',
    data: []
  },
  {
    category: 'shoulders',
    name: 'reverse fly',
    data: []
  },
  {
    category: 'biceps',
    name: 'barbell curls',
    data: []
  },
  {
    category: 'biceps',
    name: 'concentration curls',
    data: []
  },
  {
    category: 'biceps',
    name: 'hammer curls',
    data: []
  },
  {
    category: 'triceps',
    name: 'cable press down',
    data: []
  },
  {
    category: 'triceps',
    name: 'lying triceps extension',
    data: []
  },
  {
    category: 'triceps',
    name: 'close grip bench press',
    data: []
  },
  {
    category: 'legs',
    name: 'squats',
    data: []
  },
  {
    category: 'legs',
    name: 'lunges',
    data: []
  },
  {
    category: 'legs',
    name: 'leg press',
    data: []
  },
  {
    category: 'legs',
    name: 'leg extensions',
    data: []
  },
  {
    category: 'legs',
    name: 'deadlifts',
    data: []
  },
  {
    category: 'legs',
    name: 'leg curls',
    data: []
  }
];


function sortExList() {
  var list, i, switching, b, shouldSwitch;
  list = document.getElementById("exSelect");
  switching = true;
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // start by saying: no switching is done:
    switching = false;
    b = list.getElementsByTagName("LI");
    // Loop through all list-items:
    for (i = 0; i < (b.length - 1); i++) {
      // start by saying there should be no switching:
      shouldSwitch = false;
      /* check if the next item should
      switch place with the current item: */
      if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
        /* if next item is alphabetically
        lower than current item, mark as a switch
        and break the loop: */
        shouldSwitch = true;
        break;
      }

    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark the switch as done: */
      b[i].parentNode.insertBefore(b[i + 1], b[i]);
      switching = true;
    }
  }
}
var curIndex = 0;

function setExercises(exContainer, ex, exName) {
  curExercises = [];
  $(exContainer).html('');
  for (key in exercises) {
    if (exercises[key].category == ex) {
      curExercises.push(exercises[key].name);
      $(exContainer).append(`<li>${exercises[key].name}</li>`);
    }
  }
  var currentExercise = exName;
  var currentExerciseCategory = ex;
  $(exContainer).siblings('h2').html(exName);
  $(exContainer + ' li:first-child').remove();
  $('.exName h1').html(exName);
  curIndex = curExercises.length - 1;
}

// $('#nextEx').click(function(){
// var lastExercise = currentExercise;
// curIndex--;
// currentExercise = curExercises[curIndex];
// $('.exName h1').html(currentExercise);
// $('.exerciseSelect h2').text(currentExercise);
//   for(var x = 1; x<$('.exSelect li').length + 1; x++){
//     if($(`.exSelect li:nth-child(${x}`).text().toLowerCase() == currentExercise.toLowerCase()){
//       $(`.exSelect li:nth-child(${x}`).replaceWith(`<li>${lastExercise}</li>`);
//     }
//   }
//   sortExList();
//   setHistory();
// });


setExercises('.exSelect', 'chest', 'bench press');
sortExList();
$('#weights li:first-child').addClass('linkOpen');
$(`.cheast path`).css("fill", "var(--main)");
var curExercises = [];

$(document).on('click', '.exSelect li', function() {
  $(this).parent().append(`<li>${$(this).parent().siblings('h2').first().text()}</li>`);
  $(this).parent().siblings('h2').first().text($(this).text());
  currentExercise = $(this).text();
  $('.exName h1').html($(this).text());
  $(this).remove();
  sortExList();
  setHistory();
});

var exChange = true;
var exNumLast = 0;

$(document).on('click', '#weights li', function() {
  $('#weights li').removeClass('linkOpen');
  $(this).addClass('linkOpen');
  currentExerciseCategory = $(this).children('h3').text().toLowerCase();
  exNumLast = 0;
  for (key in exercises) {
    if (exercises[key].category == currentExerciseCategory) {
      exNumLast++;
      exChange = true;
      for (var x = 0; x < curExercises.length + 1; x++) {
        if (curExercises[x] == exercises[key].name) {
          exChange = false;
        }
      }
      if (exChange) {
        console.log(exercises[key].name);
        currentExercise = exercises[key].name;
        setExercises('.exSelect', currentExerciseCategory, currentExercise);
        sortExList();
      }
    }
  }
  $(`.human-body svg path`).css("fill", "var(--secondary)");
  switch (currentExerciseCategory) {
    case 'chest':
      $(`.cheast path`).css("fill", "var(--main)");
      break;
    case 'back':
      $(`.stomach path`).css("fill", "var(--main)");
      break;
    case 'biceps':
      $(`.arm path`).css("fill", "var(--main)");
      break;
    case 'triceps':
      $(`.arm path`).css("fill", "var(--main)");
      break;
    case 'shoulders':
      $(`.shoulder path`).css("fill", "var(--main)");
      break;
    case 'legs':
      $(`.legs path`).css("fill", "var(--main)");
      break;
  }
});

$(".sideMenu ol hr").css("width", `${Math.ceil($(".sideMenu ol li:nth-child(2)").width()+40)}`);
$(".sideMenu ol li:nth-child(2)").addClass('sideLinkOn');
$(".sideMenu ol li").click(function() {
  $(".sideMenu ol li").css('color', 'rgb(200, 200, 200)');
  $(this).css('color', 'var(--main)');
  $(".sideMenu ol li").removeClass('sideLinkOn');
  $(this).addClass('sideLinkOn');
  $(".sideMenu ol hr").css("width", `${Math.ceil($(this).width()+40)}`);
  var hrPos = 0;
  for (var x = 0; x < $(this).prevAll("li").length; x++) {
    hrPos = hrPos + $(`.sideMenu ol li:nth-child(${x+2})`).width() + 37;
  }
  $(".sideMenu ol hr").css("left", `${hrPos}`);
});
$(".sideMenu ol li").hover(function() {
  if (!$(this).hasClass("sideLinkOn")) {
    $(this).css('color', 'rgb(150, 150, 150)');
  }
}, function() {
  if (!$(this).hasClass("sideLinkOn")) {
    $(this).css('color', 'rgb(200, 200, 200)');
  }
});

$(".info .exerciseSelect").click(function() {
  $(".info .exArrow").toggleClass("arrowOpen");
  $(".info .exSelect").toggleClass("selectOpen");
});


$(".newEntry .exerciseSelect").click(function() {
  $(".newEntry .exArrow").toggleClass("arrowOpen2");
  $(".newEntry .exSelect").toggleClass("selectOpen");
});

$(".exTimeframe ol hr").css("width", `${Math.ceil($(".exTimeframe ol li:nth-child(2)").width()+40)}`);
$(".exTimeframe ol li:nth-child(2)").addClass('LegendLinkOn');
$(".exTimeframe ol li").click(function() {
  $(".exTimeframe ol li").css('color', 'rgb(200, 200, 200)');
  $(this).css('color', 'var(--main)');
  $(".exTimeframe ol li").removeClass('LegendLinkOn');
  $(this).addClass('LegendLinkOn');
  $(".exTimeframe ol hr").css("width", `${Math.ceil($(this).width()+40)}`);
  var hrPos = 0;
  for (var x = 0; x < $(this).prevAll("li").length; x++) {
    hrPos = hrPos + $(`.exTimeframe ol li:nth-child(${x+2})`).width() + 43;
  }
  $(".exTimeframe ol hr").css("left", `${hrPos}`);
});
$(".exTimeframe ol li").hover(function() {
  if (!$(this).hasClass("LegendLinkOn")) {
    $(this).css('color', 'rgb(150, 150, 150)');
  }
}, function() {
  if (!$(this).hasClass("LegendLinkOn")) {
    $(this).css('color', 'rgb(200, 200, 200)');
  }
});

var inputRange = document.getElementsByClassName('range')[0],
  maxValue = 100, // the higher the smoother when dragging
  speed = 5,
  currValue, rafID;

// set min/max value
inputRange.min = 0;
inputRange.max = maxValue;

// listen for unlock
function unlockStartHandler() {
  // clear raf if trying again
  window.cancelAnimationFrame(rafID);

  // set to desired value
  currValue = this.value;
}

function unlockEndHandler() {

  // store current value
  currValue = this.value;

  // determine if we have reached success or not
  if (currValue >= maxValue) {
    successHandler();
  } else {
    rafID = window.requestAnimationFrame(animateHandler);
  }
}

// handle range animation
function animateHandler() {

  // calculate gradient transition
  var transX = currValue - maxValue;

  // update input range
  currValue = inputRange.value;

  //Change slide thumb color on mouse up
  if (currValue < 20) {
    inputRange.classList.remove('ltpurple');
  }
  if (currValue < 40) {
    inputRange.classList.remove('purple');
  }
  if (currValue < 60) {
    inputRange.classList.remove('pink');
  }

  // determine if we need to continue
  if (currValue > -1) {
    window.requestAnimationFrame(animateHandler);
  }

  // decrement value
  // currValue = currValue - speed;
}

// handle successful unlock
function successHandler() {

};

// bind events
inputRange.addEventListener('mousedown', unlockStartHandler, false);
inputRange.addEventListener('mousestart', unlockStartHandler, false);
inputRange.addEventListener('mouseup', unlockEndHandler, false);
inputRange.addEventListener('touchend', unlockEndHandler, false);

// move gradient
inputRange.addEventListener('input', function() {

  if (editOn == true) {
    if (this.value < 20) {
      editDiff = 'blue';
    } else if (this.value < 40) {
      editDiff = 'ltpurple';
    } else if (this.value < 60) {
      editDiff = 'purple';
    } else {
      editDiff = 'pink';
    }
  }
  //Change slide thumb color on way up
  if (this.value > 20) {
    inputRange.classList.add('ltpurple');
  }
  if (this.value > 40) {
    inputRange.classList.add('purple');
  }
  if (this.value > 60) {
    inputRange.classList.add('pink');
  }

  //Change slide thumb color on way down
  if (this.value < 20) {
    inputRange.classList.remove('ltpurple');
  }
  if (this.value < 40) {
    inputRange.classList.remove('purple');
  }
  if (this.value < 60) {
    inputRange.classList.remove('pink');
  }
});

$(".openExMenu").click(function() {
  $(".newEntry").addClass("newEntryOpen");
});

$("#addNew").click(function() {
  $(".newEntry").addClass("newEntryOpen");
});

$(".placeholderHistory").click(function() {
  $(".newEntry").addClass("newEntryOpen");
});

$(document).click(function(e) {
  if ($(e.target).closest('.sideBar').length === 0 && $(e.target).closest('#addNew').length === 0 && $(e.target).closest('.newEntry').length === 0 && $(e.target).closest('.exHistoryLog').length === 0 && $(e.target).closest('.placeholderHistory').length === 0) {
    $(".newEntry").removeClass("newEntryOpen");
    if ($('#addHistory').text() == 'Edit') {
      $('#addHistory').html('Add');
      editOn = false;
    }
  }

  if ($(e.target).closest('.exerciseSelect').length === 0) {
    $(".exArrow").removeClass("arrowOpen");
    $(".exArrow").removeClass("arrowOpen2");
    $(".exSelect").removeClass("selectOpen");
  }

  if ($(e.target).closest('.setSelect').length === 0) {
    $(".setArrow").removeClass("setArrowOpen");
    $(".setSelectDown").removeClass("setSelectOpen");
  }
});

$(".setMenu ol hr").css("width", `${Math.ceil($(".setMenu ol li:nth-child(2)").width()+40)}`);
$(".setMenu ol li:nth-child(2)").addClass('SetLinkOn');

$(".setMenu ol li").click(function() {
  $(".setMenu ol li").css('color', 'rgb(200, 200, 200)');
  $(this).css('color', 'var(--main)');
  $(".setMenu ol li").removeClass('SetLinkOn');
  $(this).addClass('SetLinkOn');
  $(".setMenu ol hr").css("width", `${Math.ceil($(this).width()+40)}`);
  var hrPos = 0;
  for (var x = 0; x < $(this).prevAll("li").length; x++) {
    hrPos = hrPos + $(`.setMenu ol li:nth-child(${x+2})`).width() + 40;
  }
  $(".setMenu ol hr").css("left", `${hrPos}`);
});

$(".setMenu ol li").hover(function() {
  if (!$(this).hasClass("SetLinkOn")) {
    $(this).css('color', 'rgb(150, 150, 150)');
  }
}, function() {
  if (!$(this).hasClass("SetLinkOn")) {
    $(this).css('color', 'rgb(200, 200, 200)');
  }
});

$('#setMenu li:nth-child(2)').click(function() {
  editType = 'single';
  $('.setSelect').css('opacity', '0');
  setTimeout(function() {
    $('.setSelect').css('display', 'none');
    $('#sets').css('display', 'block');
  }, 290);
  setTimeout(function() {
    $('#sets').css('opacity', '1');
  }, 300);
});
$('#setMenu li:nth-child(3)').click(function() {
  editType = 'multi';
  $('#sets').css('opacity', '0');
  setTimeout(function() {
    $('.setSelect').css('display', 'block');
    $('#sets').css('display', 'none');
  }, 290);
  setTimeout(function() {
    $('.setSelect').css('opacity', '1');
  }, 300);
});

$(".setSelect").click(function() {
  $(".setSelect .setArrow").toggleClass("setArrowOpen");
  $(".setSelect .setSelectDown").toggleClass("setSelectOpen");
});

var variation = false;

$('.varWrap h3').click(function() {
  if ($(this).hasClass('varActive')) {
    $(this).removeClass('varActive');
    $('.otherText').removeClass('otherOpen');
    variation = false;
    if (editOn == true) {
      editVar = false;
    }
  } else {
    $('.varWrap h3').removeClass('varActive');
    $(this).addClass('varActive');
    variation = $(this).text();
    if (editOn == true) {
      editVar = $(this).text();
    }
    if ($(this).attr('id') == 'varOther') {
      $('.otherText').addClass('otherOpen');
    } else {
      $('.otherText').removeClass('otherOpen');
    }
  }
});

setNum = 1;
$('#addSet').click(function() {
  setNum++;
  $('#setSelect2').append(`<li id = "${setNum-1}"  class = 'exSetOptions'>${$(this).parent().siblings('#curSet')[0].innerHTML}</li>`);
  $('#curSet').html(`Set ${setNum}`);
  if ($('#removeSet').index() != 0) {
    $(`#setSelect2`).prepend(`<li id = "removeSet">Remove Set</li>`);
  }
});

var reps = [];
var weights = [];
var setId;
var curSet;

$(document).on('click', '#removeSet', function() {
  if (setNum == 2) {
    $('#removeSet').remove();
  }
  if (setNum >= 2) {
    setNum--;
    $(`#${setNum}`).remove();
    $('#curSet').html(`Set ${setNum}`);
    reps.pop();
    weights.pop();
  }
});

$('#reps').on('input', function() {
  curSet = $('#curSet').html();
  setId = parseInt(curSet.slice(-1)) - 1;
  if (reps[setId] != $('#reps').val()) {
    reps[setId] = $('#reps').val();
  }
});

$('#weight').on('input', function() {
  curSet = $('#curSet').html();
  setId = parseInt(curSet.slice(-1)) - 1;
  if (weights[setId] != $('#weight').val()) {
    weights[setId] = $('#weight').val();
  }
});


function sortList() {
  var list, i, switching, b, shouldSwitch;
  list = document.getElementById("setSelect2");
  switching = true;
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // start by saying: no switching is done:
    switching = false;
    b = list.getElementsByTagName("LI");
    // Loop through all list-items:
    for (i = 0; i < (b.length - 1); i++) {
      // start by saying there should be no switching:
      shouldSwitch = false;
      /* check if the next item should
      switch place with the current item: */

      if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase() && b[i].innerHTML.toLowerCase() != 'add more' && b[i].innerHTML.toLowerCase() != 'remove set') {
        /* if next item is alphabetically
        lower than current item, mark as a switch
        and break the loop: */
        shouldSwitch = true;
        break;
      }

      if (b[i].innerHTML.toLowerCase() == 'add more') {
        b[i].parentNode.insertBefore(b[i + 1], b[i]);
      }

    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark the switch as done: */
      b[i].parentNode.insertBefore(b[i + 1], b[i]);
      switching = true;
    }
  }
}

$(document).on('click', '.exSetOptions', function() {
  if ($('.setSelectDown li').length != reps.length && editOn == false) {
    reps.push($('#reps').val());
    weights.push($('#weight').val());
  }

  if (!isNaN(parseInt($(this).attr('id')))) {
    $('#reps').val(`${reps[parseInt($(this).attr('id'))]}`);
    $('#weight').val(`${weights[parseInt($(this).attr('id'))]}`);
    curSet = $('#curSet').html();
    setId = parseInt(curSet.slice(-1)) - 1;
    $('#curSet').html(`${$(this).html()}`);
    $(this).html(curSet);
    $(this).attr('id', `${setId}`);
  }

  sortList();

});
$(document).on('click', '#addSet', function() {
  if ($('.setSelectDown li').length != reps.length) {
    reps.push($('#reps').val());
    weights.push($('#weight').val());
  }

  if (!isNaN(parseInt($(this).attr('id')))) {
    $('#reps').val(`${reps[parseInt($(this).attr('id'))]}`);
    $('#weight').val(`${weights[parseInt($(this).attr('id'))]}`);
    curSet = $('#curSet').html();
    setId = parseInt(curSet.slice(-1)) - 1;
    $('#curSet').html(`${$(this).html()}`);
    $(this).html(curSet);
    $(this).attr('id', `${setId}`);
  }

  sortList();

});

var d = new Date();
var month = d.getMonth() + 1;
var year = d.getFullYear();
var day = d.getDate();

function formatAMPM(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0' + minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;
  return strTime;
}

$("#addHistory").click(function(e) {
  e.preventDefault();
  if ($('#addHistory').text() == 'Add') {
    var time = formatAMPM(new Date);
    var diff = $('input[type=range]').attr('class').split(' ').pop();
    if ($('#varOther').hasClass('varActive')) {
      variation = $('.otherText').val();
    }
    if ($('#setMenu li:nth-child(2)').hasClass('SetLinkOn')) {
      if (variation == false) {
        for (key in exercises) {
          if (exercises[key].name == currentExercise) {
            exercises[key].data.push({
              date: day + "/" + month + "/" + year,
              time: time,
              chartDate: day + "/" + month + "/" + year + " : " + time,
              type: 'single',
              weight: $('#weight').val() + "kg",
              reps: $('#reps').val(),
              sets: $('#sets').val(),
              diff: diff,
              variation: ''
            });

            $.ajax({
                    url: "updateData.php",
                    method: "POST",
                    data: { chartDate: day + "/" + month + "/" + year + " : " + time, type: 'single', weight: $('#weight').val() + "kg", reps: $('#reps').val(), sets: $('#sets').val(), diff: diff, variation: ''},
                    success: function() {  }
                });
          }
        }
      } else {
        for (key in exercises) {
          if (exercises[key].name == currentExercise) {
            exercises[key].data.push({
              date: day + "/" + month + "/" + year,
              time: time,
              chartDate: day + "/" + month + "/" + year + " : " + time,
              type: 'single',
              weight: $('#weight').val() + "kg",
              reps: $('#reps').val(),
              sets: $('#sets').val(),
              diff: diff,
              variation: variation
            });
          }
        }
      }
    } else if ($('#setMenu li:nth-child(3)').hasClass('SetLinkOn')) {
      var setText = '';
      var repText = '';
      var weightText = '';
      var blankSpaces = '';
      for (var i = 0; i < reps.length; i++) {
        setText = setText + 'Set ' + (parseInt(i) + 1) + '<br>';
        repText = repText + reps[i] + '<br>';
        weightText = weightText + weights[i] + 'kg' + '<br>';
        blankSpaces = blankSpaces + '<br>';
      }
      if (variation == false) {

        for (key in exercises) {
          if (exercises[key].name == currentExercise) {
            exercises[key].data.push({
              date: day + "/" + month + "/" + year + blankSpaces,
              time: time,
              chartDate: day + "/" + month + "/" + year + " : " + time,
              type: 'multi',
              weight: weightText,
              reps: repText,
              sets: setText,
              diff: diff,
              variation: ''
            });
          }
        }

      } else {

        for (key in exercises) {
          if (exercises[key].name == currentExercise) {
            exercises[key].data.push({
              date: day + "/" + month + "/" + year + blankSpaces,
              time: time,
              chartDate: day + "/" + month + "/" + year + " : " + time,
              type: 'multi',
              weight: weightText,
              reps: repText,
              sets: setText,
              diff: diff,
              variation: variation
            });
          }
        }
      }
    }
    setHistory();
  } else if ($('#addHistory').text() == 'Edit') {
    $('#addHistory').html('Add');

    for (key in exercises) {
      if (exercises[key].name == currentExercise) {
        exercises[key].data[editIndex].diff = editDiff;
        exercises[key].data[editIndex].variation = editVar;
      }
    }

    if ($('#setMenu li:nth-child(2)').hasClass("SetLinkOn")) {
      editType = 'single';
      for (key in exercises) {
        if (exercises[key].name == currentExercise) {
          exercises[key].data[editIndex].date = exercises[key].data[editIndex].date.replace(/<br>/g, "");
          exercises[key].data[editIndex].sets = editSets;
          exercises[key].data[editIndex].reps = editReps;
          exercises[key].data[editIndex].weight = editWeight;
        }
      }

    } else if ($('#setMenu li:nth-child(3)').hasClass("SetLinkOn")) {
      editType = 'multi';
      var setText = '';
      var repText = '';
      var weightText = '';
      var blankSpaces = '';
      for (var i = 0; i < reps.length; i++) {
        setText = setText + 'Set ' + (parseInt(i) + 1) + '<br>';
        repText = repText + reps[i] + '<br>';
        weightText = weightText + weights[i] + 'kg' + '<br>';
        blankSpaces = blankSpaces + '<br>';
      }

      for (key in exercises) {
        if (exercises[key].name == currentExercise) {
          exercises[key].data[editIndex].date = exercises[key].data[editIndex].date.replace(/<br>/g, "") + blankSpaces;
          exercises[key].data[editIndex].sets = setText;
          exercises[key].data[editIndex].reps = repText;
          exercises[key].data[editIndex].weight = weightText;
        }
      }

    }


    setHistory();
  }
});


var editOn = false;
var editType = 'single';
var editWeight = "";
var editReps = "";
var editSets = "";
var editDiff = "";
var editVar = "";
var editSwitch = 'single';


$('.otherText').on('input', function() {
  if (editOn == true) {
    editVar = $('.otherText').val();
  }
});
$('#sets').on('input', function() {
  if (editOn == true) {
    if (editType == 'single') {
      editSets = $('#sets').val();
    }
  }
});
$('#reps').on('input', function() {
  if (editOn == true) {
    if (editType == 'single') {
      editReps = $('#reps').val();
    } else if (editType == 'multi') {
      reps[parseInt($('#curSet').text().substring(4)) - 1] = $('#reps').val();
    }
  }
});
$('#weight').on('input', function() {
  if (editOn == true) {
    if (editType == 'single') {
      editWeight = $('#weight').val();
    } else if (editType == 'multi') {
      weights[parseInt($('#curSet').text().substring(4)) - 1] = $('#weight').val();
    }
  }
});



var editIndex = 0;

$(document).on('click', '.exHistoryLog', function() {
  if (!clickedRemove) {
    editIndex = $(this).index() - 1;
    $(".newEntry").addClass("newEntryOpen");
    $('#addHistory').html("Edit");
    if ($(this).children()[1].innerHTML.substring(0, 3).toLowerCase() == "set") {
      editType = 'multi';

      $(".setMenu ol li").css('color', 'rgb(200, 200, 200)');
      $(".setMenu ol li:nth-child(3)").css('color', 'var(--main)');
      $(".setMenu ol li").removeClass('SetLinkOn');
      $(".setMenu ol li:nth-child(3)").addClass('SetLinkOn');
      $(".setMenu ol hr").css("width", `${Math.ceil($(".setMenu ol li:nth-child(3)").width()+40)}`);
      var hrPos = $(`.setMenu ol li:nth-child(3)`).width() + 30;
      $(".setMenu ol hr").css("left", `${hrPos}`);

      $('#sets').css('opacity', '0');
      setTimeout(function() {
        $('.setSelect').css('display', 'block');
        $('#sets').css('display', 'none');
      }, 290);
      setTimeout(function() {
        $('.setSelect').css('opacity', '1');
      }, 300);

      $('.varWrap h3').removeClass('varActive');
      $('.otherText').removeClass('otherOpen');
      if ($(this).children()[0].lastChild.lastChild.textContent.toLowerCase() == 'variation: incline') {
        $('#incline').addClass('varActive');
      } else if ($(this).children()[0].lastChild.lastChild.textContent.toLowerCase() == 'variation: decline') {
        $('#decline').addClass('varActive');
      } else if ($(this).children()[0].lastChild.lastChild.textContent.toLowerCase().substring(0, 9) == 'variation') {
        $('#varOther').addClass('varActive');
        $('.otherText').addClass('otherOpen');
        $('.otherText').val($(this).children()[0].lastChild.lastChild.textContent.toLowerCase().substring(11));
      }
      switch ($(this).children().children()[$(this).children().children().length - 2].classList[$(this).children().children()[$(this).children().children().length - 2].classList.length - 1]) {
        case 'blue':
          $('.range').val(0);
          $('.range').addClass('blue');
          break;
        case 'ltpurple':
          $('.range').val(25);
          $('.range').addClass('ltpurple');
          break;
        case 'purple':
          $('.range').val(50);
          $('.range').addClass('purple');
          break;
        case 'pink':
          $('.range').val(100);
          $('.range').addClass('pink');
          break;

      }

      var curSetsArray = [];
      var curRepsArray = [];
      var curWeightArray = [];

      curSetsArray = $(this).children()[1].innerHTML.split('<br>');
      curSetsArray.pop();

      curRepsArray = $(this).children()[3].innerHTML.split('<br>');
      curRepsArray.pop();

      curWeightArray = $(this).children()[2].innerHTML.split('kg<br>');
      curWeightArray.pop();

      reps = [];
      weight = [];

      $('#curSet').html(`Set 1`);
      $(`#setSelect2 .exSetOptions`).remove();
      $('#reps').val(curRepsArray[0]);
      $('#weight').val(curWeightArray[0]);

      for (var i = 0; i < curSetsArray.length; i++) {
        reps.push(curRepsArray[i]);
        weights.push(curWeightArray[i]);
        if (typeof curSetsArray[i + 1] != 'undefined') {
          $('#setSelect2').append(`<li id = "${i+1}"  class = 'exSetOptions'>${curSetsArray[i+1]}</li>`);
          setNum = i + 1;
        }
      }

      sortList();

    } else {

      editType = 'single';

      $(".setMenu ol li").css('color', 'rgb(200, 200, 200)');
      $(".setMenu ol li:nth-child(2)").css('color', 'var(--main)');
      $(".setMenu ol li").removeClass('SetLinkOn');
      $(".setMenu ol li:nth-child(2)").addClass('SetLinkOn');
      $(".setMenu ol hr").css("width", `${Math.ceil($(".setMenu ol li:nth-child(2)").width()+40)}`);
      var hrPos = 0;
      $(".setMenu ol hr").css("left", `${hrPos}`);

      $('.setSelect').css('opacity', '0');
      setTimeout(function() {
        $('.setSelect').css('display', 'none');
        $('#sets').css('display', 'block');
      }, 290);
      setTimeout(function() {
        $('#sets').css('opacity', '1');
      }, 300);
      $('#sets').val($(this).children()[1].innerHTML);
      $('#reps').val($(this).children()[3].innerText.slice(0, -2));
      $('#weight').val($(this).children()[2].textContent.slice(0, -2));
      editSets = $(this).children()[1].innerHTML;
      editReps = $(this).children()[3].innerText.slice(0, -2);
      editWeight = $(this).children()[2].textContent;
      $('.varWrap h3').removeClass('varActive');
      $('.otherText').removeClass('otherOpen');
      if ($(this).children()[0].lastChild.lastChild.textContent.toLowerCase() == 'variation: incline') {
        $('#incline').addClass('varActive');
      } else if ($(this).children()[0].lastChild.lastChild.textContent.toLowerCase() == 'variation: decline') {
        $('#decline').addClass('varActive');
      } else if ($(this).children()[0].lastChild.lastChild.textContent.toLowerCase().substring(0, 9) == 'variation') {
        $('#varOther').addClass('varActive');
        $('.otherText').addClass('otherOpen');
        $('.otherText').val($(this).children()[0].lastChild.lastChild.textContent.toLowerCase().substring(11));
      }
      switch ($(this).children().children()[$(this).children().children().length - 2].classList[$(this).children().children()[$(this).children().children().length - 2].classList.length - 1]) {
        case 'blue':
          $('.range').val(0);
          $('.range').addClass('blue');
          editDiff = 'blue';
          break;
        case 'ltpurple':
          $('.range').val(25);
          $('.range').addClass('ltpurple');
          editDiff = 'ltpurple';
          break;
        case 'purple':
          $('.range').val(50);
          $('.range').addClass('purple');
          editDiff = 'purple';
          break;
        case 'pink':
          $('.range').val(100);
          $('.range').addClass('pink');
          editDiff = 'pink';
          break;

      }
    }
    editOn = true;
  }
});

var setArray = [];
var repArray = [];
var weightArray = [];
var dateArray = [];
var timeArray = [];

var weightGraphArray = [];


var mSetArray = [];
var mRepArray = [];
var mWeightArray = [];
var mDateArray = [];
var mTimeArray = [];

var cRepArray = [];
var cWeightArray = [];

var dataType = "";
var setChartDate = "";

function setHistory() {
  setArray = [];
  repArray = [];
  weightArray = [];
  dateArray = [];
  timeArray = [];

  weightGraphArray = [];

  mRepArray = [];
  mWeightArray = [];

  cRepArray = [];
  cWeightArray = [];

  for (key in exercises) {
    if (exercises[key].name == currentExercise) {
      $('.exHistoryLog').remove();
      for (key2 in exercises[key].data) {
        var setDate = exercises[key].data[key2].date;
        var setTime = exercises[key].data[key2].time;
        setChartDate = exercises[key].data[key2].chartDate;
        var setSets = exercises[key].data[key2].sets;
        var setWeight = exercises[key].data[key2].weight;
        var setReps = exercises[key].data[key2].reps;
        var setDiff = exercises[key].data[key2].diff;
        var setVariation = exercises[key].data[key2].variation;
        dataType = exercises[key].data[key2].type;

        if (exercises[key].data[key2].type == "single") {
          dateArray.push(setChartDate);
          timeArray.push(setTime);
          setArray.push(setSets);
          repArray.push(setReps);
          weightArray.push(setWeight);
          weightGraphArray.push(setWeight.slice(0, -2));
          cWeightArray.push(setWeight.slice(0, -2));
          cRepArray.push(setReps);
        } else if (exercises[key].data[key2].type == "multi") {
          var splitWeight = setWeight.split('kg<br>');
          splitWeight.pop();
          if (mWeightArray.length > 0) {
            mWeightArray = (mWeightArray + "," + splitWeight).split(',');
          } else {
            mWeightArray = splitWeight;
          }
          var splitReps = setReps.split('<br>');
          splitReps.pop();
          if (mRepArray.length > 0) {
            mRepArray = (mRepArray + "," + splitReps).split(',');
          } else {
            mRepArray = splitReps;
          }

          if (cWeightArray.length > 0) {
            cWeightArray = (cWeightArray + "," + splitWeight).split(',');
          } else {
            cWeightArray = splitWeight;
          }

          if (cRepArray.length > 0) {
            cRepArray = (cRepArray + "," + splitReps).split(',');
          } else {
            cRepArray = splitReps;
          }

          mDateArray = [];
          mTimeArray = [];
          for (var z = 0; z < mRepArray.length; z++) {
            mDateArray.push(setChartDate);
            mTimeArray.push(setTime);
          }
        }
        if ($('#setMenu li:nth-child(2)').hasClass('SetLinkOn')) {
          if (setVariation == "") {
            $('.exHistory').append(`<ul class = "exHistoryLog"><li>${setDate}<div class = "exTime">${setTime}</div></li><li>${setSets}</li><li>${setWeight}</li><li>${setReps}<hr class = 'diffIndicator ${setDiff}'><div class = 'exRemove'>X</div></li></ul>`);
          } else {
            $('.exHistory').append(`<ul class = "varHistory exHistoryLog"><li>${setDate} <div class = "exTime">${setTime}</div><div id="exVar">Variation: ${setVariation}</div></li><li>${setSets}</li><li>${setWeight}</li><li>${setReps}<hr class = 'diffIndicator ${setDiff}'><div class = 'exRemove'>X</div></li></ul>`);
          }
        } else if ($('#setMenu li:nth-child(3)').hasClass('SetLinkOn')) {
          if (setVariation == "") {
            $('.exHistory').append(`<ul class="exHistoryLog"><li>${setDate}<div class = "exTime">${setTime}</div></li><li>${setSets}</li><li>${setWeight}</li><li>${setReps}<hr class = 'diffIndicator ${setDiff}'><div class = 'exRemove'>X</div></li></ul>`);
          } else {
            $('.exHistory').append(`<ul class = "varHistory exHistoryLog"><li>${setDate} <div class = "exTime">${setTime}</div><div id="exVar">Variation: ${setVariation}</div></li><li>${setSets}</li><li>${setWeight}</li><li>${setReps}<hr class = 'diffIndicator ${setDiff}'><div class = 'exRemove'>X</div></li></ul>`);
          }
        }
      }
      if (exercises[key].data.length == 0) {
        $('.exPlaceholder').css('display', 'flex');
        $('.exChart').css('opacity', '0');
      } else {
        $('.exPlaceholder').css('display', 'none');
        $('.exChart').css('opacity', '1');
      }

      setCombinedGraph();
    }
  }
  $(".newEntry").removeClass("newEntryOpen");
  $(".info").animate({
    scrollTop: $('.exHistory').height() + $('.exChart').height()
  }, 500);
}

function setCombinedGraph() {
  $(".chartMenu ol li").css('color', 'rgb(200, 200, 200)');
  $(".chartMenu ol li:nth-child(4)").css('color', 'var(--main)');
  $(".chartMenu ol li").removeClass('chartLinkOn');
  $(".chartMenu ol li:nth-child(4)").addClass('chartLinkOn');
  $(".chartMenu ol hr").css("width", `${Math.ceil($('.chartMenu ol li:nth-child(4)').width()+50)}`);
  var hrPos = 0;
  for (var x = 0; x < $(".chartMenu ol li:nth-child(4)").prevAll("li").length; x++) {
    hrPos = hrPos + $(`.chartMenu ol li:nth-child(${x+2})`).width() + 33.3;
  }
  $(".chartMenu ol hr").css("left", `${hrPos}`);

  var cDateArray = [];
  for (key in exercises) {
    if (exercises[key].name == currentExercise) {
      for (key2 in exercises[key].data) {

        if (exercises[key].data[key2].type == "single") {
          cDateArray.push(setChartDate);
        } else if (exercises[key].data[key2].type == "multi") {
          var numSets = exercises[key].data[key2].sets.split('<br>');
          numSets.pop();
          for (var z = 0; z < numSets.length; z++) {
            cDateArray.push(setChartDate);
          }
        }


      }
    }
  }

  var ctx = document.getElementById('exChart').getContext('2d');
  var exChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: cDateArray,
      datasets: [{
          label: 'Weight',
          data: cWeightArray,
          backgroundColor: [
            'rgba(184, 249, 7, 0.2)'
          ],
          borderColor: [
            'rgba(184, 249, 7, 1)'
          ],
          borderWidth: 1
        },
        {
          label: 'Reps',
          data: cRepArray,
          backgroundColor: [
            'rgba(7, 249, 17, 0.2)'
          ],
          borderColor: [
            'rgba(7, 249, 17, 1)'
          ],
          borderWidth: 1
        }
      ]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
}

$(document).on('mouseenter', '.exHistoryLog', function() {
  $(this).children().last().children('.exRemove').addClass('exRemoveOn');
});

$(document).on('mouseleave', '.exHistoryLog', function() {
  $(this).children().last().children('.exRemove').removeClass('exRemoveOn');
});

$(document).on('click', '.exRemove', function() {
  var listNum = $(this).parent().parent().index() - 1;

  for (key in exercises) {
    if (exercises[key].name == currentExercise) {
      exercises[key].data.splice(listNum, 1);
      cDateArray.splice(listNum, 1);
      setHistory();
      if (listNum == 0) {
        setCombinedGraph();
      }
    }
  }

});


var clickedRemove = false;
$(document).mouseover(function(e) {
  if ($(e.target).closest('.exRemove').length === 0) {
    clickedRemove = false;
  } else {
    clickedRemove = true;
  }
});
