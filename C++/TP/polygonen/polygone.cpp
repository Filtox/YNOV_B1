#include <iostream>
#include "polygone.h"
#include "math.h"

Polygone::Polygone()
{

}
void Polygone::addPoint(const Point &p)
{
    m_listPoint.push_back(p);
}

double Polygone::length() const
{

    int i=0;
    Point next;
    int perimetre = 0;
    Point first = m_listPoint[0];

    for(i = 0; i < m_listPoint.size()-1 ; i++)
    {
       Point current = m_listPoint[i];
       next = m_listPoint[i+1];
       perimetre += current.getDistanceTo(next);
    }
    perimetre += next.getDistanceTo(first);


    return perimetre;
}

void Polygone::show() const
{
    cout << length() << endl;
}
