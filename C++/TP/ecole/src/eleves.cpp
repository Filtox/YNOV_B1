#include "eleves.h"


Eleve::Eleve()
{

}

string Eleve::prenom() const
{
    return Prenom;
}
string Eleve::nom() const
{
    return Nom;
}
void Eleve::ajoutePrenom(string &prenom)
{
    Prenom = prenom;
}
void Eleve::ajouteNom(string &nom)
{
    Nom = nom;
}
void Eleve::ajouteNomPrenom(string prenom, string nom)
{
    ajoutePrenom(prenom);
    ajouteNom(nom);
}


void Eleve::ajouteNote(const int &note)
{
    Note.push_back(note);
}


float Eleve::moyenne() const
{
    return Moyenne();
}
void Eleve::ajouteMoyenne(float moyenne)
{
    Moyenne = moyenne;
}
void Eleve::moyenneEleve()
{
    int i = 0;
    float somme = 0, tailleNote = Note.size();
    float moyenneParEleve;

    for ( i = 0; i< tailleNote; i++)
    {
        somme += Note[i];
    }
    moyenneParEleve = somme /= tailleNote;

    ajouteMoyenne(moyenneParEleve);
}
