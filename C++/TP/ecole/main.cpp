#include "eleves.h"
#include "groupe.h"

using namespace std;

int main()
{
    Groupe groupe_1,groupe_2;
    groupe_1.ajouteGroupe("France");
    groupe_2.ajouteGroupe("USA");

    Eleve eleve_1, eleve_2, eleve_3, eleve_4;
    eleve_1.ajouteNomPrenom ("François", "Hollande");
    eleve_1.ajouteNote(5);
    eleve_1.ajouteNote(10);
    eleve_1.ajouteNote(15);
    eleve_2.ajouteNomPrenom("Nicolas", "Sarkozy");
    eleve_2.ajouteNote(20);
    eleve_2.ajouteNote(12);
    eleve_2.ajouteNote(10);
    eleve_3.ajouteNomPrenom("Barack", "Obama");
    eleve_3.ajouteNote(0);
    eleve_3.ajouteNote(5);
    eleve_3.ajouteNote(15);
    eleve_4.ajouteNomPrenom("Donald", "Trump");
    eleve_4.ajouteNote(0);
    eleve_4.ajouteNote(5);
    eleve_4.ajouteNote(10);

    groupe_1.ajouteEleve(eleve_1);
    groupe_1.ajouteEleve(eleve_2);
    groupe_2.ajouteEleve(eleve_3);
    groupe_2.ajouteEleve(eleve_4);

    groupe_1.moyennegrp();
    groupe_2.moyennegrp();
    return 0;
}
