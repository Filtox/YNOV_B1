using UnityEngine;
using System.Collections;

public class AwakeAndStart : MonoBehaviour
{
    void Awake()    // Appelé en premier
    {
        Debug.Log("Awake called.");
    }


    void Start()    // Initialisé après Awake
    {
        Debug.Log("Start called.");
    }
}