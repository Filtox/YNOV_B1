//jQuery(document).ready();
$(document).ready(function() {
  $('div');
  $('.row');
  $('#firstname');
  $('.col#col2');
  $('input[name=pseudo]');

  // $('p').each(function(){
  //   console.log(this.classList);
  //   $(this).html('Hello World !'); // $(this) représente le paragraphe courant
  // });

   let $col2 = $('#col2');
  //
  // console.log($col2.hasClass('toto'));
  // $col2.addClass('toto');
  // console.log($col2.hasClass('toto'));;
  // $col2.removeClass('toto');
  // $col2.toggleClass('toto'); //ajoute si absent, supprime si présent


  // let myDiv = $col2.children('#myDiv');
  // console.log(myDiv);
  // console.log(myDiv.parent());
  //
  // $col2.append('<div id="myDiv2"></div>');
  // let myDiv2 = $('#myDiv2');
  // myDiv2.text("here is my text");
  //
  // console.log(myDiv2.html());
  // myDiv2.html('modified content');
  //
  // $col2.prepend('<div id="myDiv3">im prepend</div>');

   $col2.after('<div id="myDiv4">after div</div>');
   $col2.before('<div id="myDiv5">before div</div>');
  // $('#myDiv5').remove();
  //
  // let $myDiv4 = $('#myDiv4');
  // $myDiv4.attr('foo', 'bar');
  // console.log($myDiv4.attr('foo'));
  // $myDiv4.removeAttr('foo');
  // console.log($myDiv4.attr('foo'));
  //
  // $myDiv4.css('color','red');
  // console.log($myDiv4.css('color'));

  // $('#testJS').click(function() {
  //   $(this).children('i').toggleClass('fa-play');
  //   $(this).children('i').toggleClass('fa-pause');
  // });

  
//  $('#testJS3').click(function() {
//    $('#age1').css('visibility', 'visible');
//  });

//  function nombre() {
//    var x = document.getElementById("age3").value;
//    document.getElementById("demo").innerHTML = "You wrote: " + x;
//  }

//	});



// TP
// ajouter un bouton "Afficher la suite du formulaire"
// au click du bouton faire apparaître un input pour rentrer l'âge
// afficher un message d'erreur si l'age nest pas un chiffre
// si l'age n'est pas un chiffre ajouter la class 'is-invalid' à l'input
// enlever la class 'is-invalid' si l'age est à nouveau un number
// faire un bouton envoyer lors du click sur envoyer controler que tout les champs ont bien été remplis correctement
// faire un span alert (https://getbootstrap.com/docs/4.0/components/alerts/) si aucune erreur le mettre en success et afficher message bien envoyé si il y a une erreur le mettre en rouge et dire quel champs à une erreur
