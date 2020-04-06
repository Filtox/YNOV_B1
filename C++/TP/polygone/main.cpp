#include "point.h"
#include "polygone.h"

#include <iostream>

using namespace std;

/**
 * Début du programme
 */
int main()
{
    Point p1,p2,p3,p4;
    /*Point testPoint(10, 10, 0, 0, 1000, 1000);

    testPoint.show();
    testPoint.setXY(2000, 2000);
    testPoint.show();
    testPoint.move(10000, 10000);
    testPoint.show();
    return 0;*/
    p1.setXY(10,10);
    p1.show();

    p2.setXY(20,10);
    p2.show();

    p3.setXY(20,20);
    p3.show();

    p4.setXY(10,20);
    p4.show();

    Polygone polygon;
    polygon.addPoint(p1);
    polygon.addPoint(p2);
    polygon.addPoint(p3);
    polygon.addPoint(p4);
    // ca devrait faire 40
    double perimetre = polygon.length();
    polygon.show();

    return 0;
}
