#ifndef POLYGONE_H
#define POLYGONE_H

#include "point.h"
#include <vector>

using namespace std;

class Polygone{
    // Attributs
    vector<Point> m_listPoint;

public:
    // Constructeurs
    Polygone();
    // Destructeurs

    // Méthodes
    void addPoint(const Point &p) ;

    double length() const;

    void show() const;
};

#endif
