//jQuery(document).ready();
$(document).ready(function() {

  $('#spinner').hide();
  $('#spinner2').hide();

  $('#sendMessage').click(function() {
    $.ajax({
      url: 'sendMail.html',
      type: 'GET',
      data: 'email=' + $('#email').val() + '&message=' + $('#message').val(),
      beforeSend: function() {
        console.log('email=' + $('#email').val() + '&message=' + $('#message').val());
        $('#spinner').show();
      },
      success: function(data) {
        $('#result').html('your mail has been sent <br />' + data);
      },
      error: function() {
        $('#result').html('snap there is an error');
      },
      complete: function() {
        $('#spinner').hide();
      }
    });
  });

  const apiKey = 'fc8ce4c782592ddd49924f43cc492cf6';

  $('#sendAjax').click(function() {
    $.ajax({
      url: 'http://api.openweathermap.org/data/2.5/weather',
      type: 'GET',
      data: 'APPID=' + apiKey + '&units=metric&q=' + $('#city').val(),
      beforeSend: function() {
        $('#spinner2').show();
      },
      success: function(data) {
        $('#result2').html(data.weather[0].description + '<br />' + data.main.temp + ' °C');
      },
      error: function() {
        $('#result').html('snap there is an error');
      },
      complete: function() {
        $('#spinner2').hide();
      }
    });
  });

  $('#sendAjaxp').click(function() {
    $.ajax({
      url: 'http://api.openweathermap.org/data/2.5/forecast', // ?q={city name},{country code}
      type: 'GET',
      data: 'APPID=' + apiKey + '&units=metric&q=' + $('#cityp').val() + ',FR',
      beforeSend: function() {
        $('#spinner3').show();
      },
      success: function(data) {
        console.log(data);
        $('#result3').html(data.list[0].weather[0].description + '<br />'); //+ data.main.temp + ' °C');
       
      },
      error: function() {
        $('#result').html('snap there is an error');
      },
      complete: function() {
        $('#spinner3').hide();
      }
    });
  });

});

/**
 * TP
 * Lien doc API : https://openweathermap.org/forecast5
 * récupérer et afficher les prévisions
 *
 */
