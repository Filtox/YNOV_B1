#include <iostream>
#include <vector>

using namespace std;

class Eleve
{
    string Nom;
    string Prenom;
    vector<int> Note;
    float Moyenne;

public:

    Eleve();

    string prenom() const;
    string nom() const;
    void ajoutePrenom(string &prenom);
    void ajouteNom(string &nom);
    void ajouteNomPrenom(string prenom,string nom);

    void ajouteNote(const int &note);
    void moyenneEleve();
    float moyenne() const;
    void ajouteMoyenne(float moyenne);
};
