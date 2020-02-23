// Ce script permet de multiplier un nombre par un autre et l'afficher dans la console de Unity

using UnityEngine;
using System.Collections;
using System.Collections.Generic;

public class VariablesAndFunctions : MonoBehaviour
{
    int myInt = 5;


    void Start()
    {
        myInt = MultiplyByTwo(myInt);
        Debug.Log(myInt);
    }


    int MultiplyByTwo(int number)
    {
        int ret;
        ret = number * 2;
        return ret;
    }
}