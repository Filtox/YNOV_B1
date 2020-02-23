// Ce script permet de changer la couleur d'un objet dans le jeu. Il change le couleur à partir du composant Renderer.

using UnityEngine;
using System.Collections;
using System.Collections.Generic;

public class changeColor : MonoBehaviour    // le nom du script dans le jeu se nomme changeColor
{
    void Update()
    {
        if (Input.GetKeyDown(KeyCode.R))
        {
            GetComponent<Renderer>().material.color = Color.red;
        }
        if (Input.GetKeyDown(KeyCode.G))
        {
            GetComponent<Renderer>().material.color = Color.green;
        }
        if (Input.GetKeyDown(KeyCode.B))
        {
            GetComponent<Renderer>().material.color = Color.blue;
        }
    }
}