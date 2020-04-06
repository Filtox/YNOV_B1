#include <iostream>
#include <math.h>
using namespace std;

#include "point.h"


#define X_MAX  1000
#define Y_MAX  2000

Point::Point():m_x(0),m_y(0)
{

}

int Point::x() const
{

    return m_x;
}

void Point::setX(int x)
{
    if (x > X_MAX){
        x = X_MAX;
    }
    m_x = x;
}

int Point::y() const
{
    return m_y;
}

void Point::setY(int y)
{
    if (y > Y_MAX){
        y = Y_MAX;
    }
    m_y = y;
}



void Point::setXY(int x, int y)
{
    setX(x);
    setY(y);
}

void Point::show()
{
    cout << "X: " << x() << "Y: " << y() << endl;
}

double Point::getDistanceTo(Point &p)
{
    // sqrt((xb -xa)²+(yb-ya)²)

    double distance = sqrt(pow(m_x - p.x(),2)+pow(m_y - p.y(),2));
    show();
    p.show();
    cout << "distance : " << distance << endl;
    return distance;
}
