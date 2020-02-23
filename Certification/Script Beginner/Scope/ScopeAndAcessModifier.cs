using UnityEngine;
using System.Collections;

public class ScopeAndAccessModifiers : MonoBehaviour 
{
    public int alpha = 5;   //public indique qu'on peut accéder à la classe en dehors de la "class". Ceci vuet aussi dire qu'on verra la variable est visible dans l'inspector de Unity


    private int beta = 0;
    private int gamma = 5;


    private AnotherScope myOtherClass;


    void Start()
    {
        alpha = 29;

        myOtherClass = new AnotherScope();
        myOtherClass.FruitMachine(alpha, myOtherClass.apples);
    }


    void Example(int pens, int crayons)
    {
        int answer;
        answer = pens * crayons * alpha;
        Debug.Log(answer);
    }


    void Update()
    {
        Debug.Log("Alpha is set to: " + alpha);
    }
}