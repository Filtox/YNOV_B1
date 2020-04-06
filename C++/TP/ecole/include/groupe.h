#include "eleves.h"
using namespace std;


class Groupe
{
    string Groupes;
    vector <Eleve> liste;
    float MoyenneNoteGroupe;

public:
    Group();

    string groupe() const;
    void ajouteGroupe(const string &groupe);

    float moyenneNoteGroupe() const;
    void ajouteMoyenneNoteGroupe(float moyenneNoteGroupe);

    void ajouteEleve(const Eleve &eleve);
    void moyenneGroupe();
    void moyennegrp();
    void affichage();
};
