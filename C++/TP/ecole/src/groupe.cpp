#include "groupe.h"

Groupe::Groupe()
{

}

void Groupe::ajouteEleve(const Eleve &eleve)
{
    liste.push_back(eleve);
}

string Groupe::groupe() const
{
    return Groupes;
}
void Groupe::ajouteGroupe(const string &groupe)
{
    Groupes = groupe;
}

void Groupe::moyennegrp()
{
    int i = 0, tailleListe = liste.size();
    for ( i = 0; i< tailleListe; i++)
    {
        moyenneGroupe();
    }
    affichage();
}
void Groupe::ajouteMoyenneNoteGroupe(float moyenneNoteGroupe)
{
    MoyenneNoteGroupe = moyenneNoteGroupe;
}
float Groupe::moyenneNoteGroupe() const
{
    return MoyenneNoteGroupe;
}
void Groupe::moyenneGroupe()
{

    int i = 0;
    float somme = 0, tailleListe = liste.size();
    float moyenne;
    for ( i = 0; i< tailleListe; i++){
        liste[i].moyenneEleve();
        somme += liste[i].moyenne();
    }
    moyenne = somme /= tailleListe;

    ajouteMoyenneNoteGroupe(moyenne);

}

void Groupe::affichage()
{

    int j = liste.size();
    cout << groupe() << " Groupe" << " Moyenne : " << moyenneNoteGroupe() << "\n" << endl;
    for (int i= 0; i<j; i++)
    {
     cout << i+1 << " Moyenne de " << liste[i].nom() << " : " << liste[i].moyenne() << "\n" << endl;
    }
    cout <<"\n " << endl;
}
