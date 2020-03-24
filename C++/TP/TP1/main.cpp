#include <iostream>
#include <string>
#include <vector>
#include <fstream>

using namespace std;

void creerFichier()
{
    ofstream fileStream;
    fileStream.open("names.txt");
    fileStream << "Janice" << endl;
    fileStream << "Pierre" << endl;
    fileStream << "Nicolas" << endl;
    fileStream << "Theodor" << endl;
}

bool chargeFichier(vector<string> &listeNom)
{
    ifstream fileStream("names.txt");
    string LINE;
    if (fileStream.is_open()) {
        while (getline(fileStream, LINE))listeNom.push_back(LINE);
    } else {
        return false;
    }
    return true;
}

bool chercheNom(string nom, const vector<string> &listeNoms)
{
    for(int i = 0; i < listeNoms.size(); i++) if(listeNoms[i] == nom) return true;
    return false;
}

int main()
{
    creerFichier();
    vector<string> names;
    chargeFichier(names);
    cout<< chercheNom("Pierre", names) << endl;
    cout<< chercheNom("Dmitrii", names) << endl;
    return 0;
}
