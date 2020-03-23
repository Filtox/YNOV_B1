#include <iostream>
#include <string>
#include <vector>
#include <fstream>

using namespace std;

void creerFichier()
{
    string fname = "names.txt";
    ofstream fileStream(fname);
    fileStream << "Janice" << endl;
    fileStream << "Pierre" << endl;
    fileStream << "Nicolas" << endl;
    fileStream << "Theodor" << endl;
}

bool chargeFichier(vector<string> &listeNom)
{
    string fname = "names.txt";
    ifstream fileStream(fname);
    string LINE;

    if (!fileStream.is_open()) {
        return false;
    }

    while (getline(fileStream, LINE))
    {
        listeNom.push_back(LINE);
    }
    return true;
}

bool chercheNom(string nom, const vector<string> &listeNoms)
{
    for(int i = 0; i < listeNoms.size(); i++) {
        if(listeNoms.at(i) == nom){ // [i] no verification
            return true;
        }
    }
    return false;
}

int main()
{
    creerFichier();
    vector<string> names;
    chargeFichier(names);
    cout << chercheNom("Pierre", names) << endl;
    cout << chercheNom("Dmitrii", names) << endl;
    return 0;
}
