#ifndef POINT_H
#define POINT_H


class Point
{
    int m_x;
    int m_y;
public:
    Point();

    int x() const;
    void setX(int x);

    int y() const;
    void setY(int y);

    void setXY(int x,int y);

    void show();

    double getDistanceTo(Point &p);
};

#endif // POINT_H
