//jQuery(document).ready();
$(document).ready(function () {

    let users = [];

    let jsonUsers = localStorage.getItem('data');
    let oldUsers = JSON.parse(jsonUsers);
    if (oldUsers) {
        users = oldUsers;
    }

    $('#saveForm').click(function() {
    let formData = {};
    formData.firstname = $('#firstname').val();
      formData.lastname = $('#lastname').val();
        formData.age = $('#age').val();
        users.push(formData);
        console.log(users);
    localStorage.setItem('data', JSON.stringify(users));
  });

  $('#clear').click(function(){
    localStorage.clear();
    alert('local storage cleared');
  });

  localStorage.clear();
  localStorage.setItem('foo', 'bar');
  console.log(localStorage.getItem('foo'));
  localStorage.removeItem('foo');
  console.log(localStorage.getItem('foo'));


  let myObj = { a : 123 };
  let myObjJSON = JSON.stringify(myObj);

  localStorage.setItem('myObj', myObjJSON);
  let myObj2JSON = localStorage.getItem('myObj');
  let myObj2 = JSON.parse(myObj2JSON);
    console.log(myObj2);

    if (users) {
        let i = 0;
        for (i = 0; i < users.length; i++) {
            $('p').text(users[i].lastname + ', ' + users[i].firstname + ', ' + users[i].age);
        }
    }

});

/**
 * TP
 * Rajouter un champ age au formulaire
 * Le stocker dans le local storage avec les 2 autres informations
 * Lors de l'ouverture de la page si le local storage contient des données les afficher en dessous le formulaire
 * **************************
 *
 * TP todolist
 - Ecrire des todos
 - Supprimer des todos
 - Stocker le JSON via local storage
 - Au refresh reprend les données du local storage
 - Bonus style CSS
 - Bonus animation JS

 Bonus :
 - Afficher les todo terminés
 - Editer un todo
 */
