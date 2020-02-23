#include <stdio.h>
#include <string.h>
#include "phplib.h"

/*
http://php.net/manual/fr/function.explode.php
http://php.net/manual/fr/function.implode.php
http://php.net/manual/fr/function.lcfirst.php           //
http://php.net/manual/fr/function.ltrim.php             //
http://php.net/manual/fr/function.nl2br.php             //
http://php.net/manual/fr/function.number-format.php
http://php.net/manual/fr/function.rtrim.php             //
http://php.net/manual/fr/function.str-pad.php           //
http://php.net/manual/fr/function.str-repeat.php        //
http://php.net/manual/fr/function.str-rot13.php         //
http://php.net/manual/fr/function.str-shuffle.php       //
http://php.net/manual/fr/function.str-split.php
http://php.net/manual/fr/function.str-word-count.php    //
http://php.net/manual/fr/function.strcasecmp.php
http://php.net/manual/fr/function.stripos.php
http://php.net/manual/fr/function.strrchr.php
http://php.net/manual/fr/function.strrev.php            //
http://php.net/manual/fr/function.strripos.php
http://php.net/manual/fr/function.strrpos.php
http://php.net/manual/fr/function.strtok.php
http://php.net/manual/fr/function.strtolower.php        //
http://php.net/manual/fr/function.strtoupper.php        //
http://php.net/manual/fr/function.strtr.php             //
http://php.net/manual/fr/function.substr-count.php
http://php.net/manual/fr/function.substr-replace.php
http://php.net/manual/fr/function.substr.php
http://php.net/manual/fr/function.trim.php              //
http://php.net/manual/fr/function.ucfirst.php           //
http://php.net/manual/fr/function.ucwords.php           //
http://php.net/manual/fr/function.wordwrap.php          //

*/


int main()
{
    printf("Hello World!\n\n");
    printf("Fonctions de Pierre Da Silva\n\n");
    int nbPoint = 0;


//http://php.net/manual/fr/function.implode.php
    char tableauImplode1[50] = "Hello";
    char tableauImplode2[25] = "World";
    implode(tableauImplode1, tableauImplode2);
    if(strcmp(tableauImplode1, "Hello World") == 0)
    {
        printf("implode fonctionne\n");
        nbPoint++;
    }
    else
    {
        printf("implode ne fonctionne pas\n");
    }


// http://php.net/manual/fr/function.lcfirst.php
    char foo[20] = "HelloWorld";
    lcfirst(foo);
    if(strcmp(foo, "helloWorld") == 0)
    {
        printf("lcfirst fonctionne\n");
        nbPoint++;
    }
    else
    {
        printf("lcfirst ne fonctionne pas\n");
    }


//http://php.net/manual/fr/function.ltrim.php
    char tableauLtrim1[20] = "  Hello";
    char tableauLtrim2[20];
    ltrim(tableauLtrim1, tableauLtrim2);
    if(strcmp(tableauLtrim2, "Hello") == 0)
    {
        printf("ltrim fonctionne\n");
        nbPoint++;
    }
    else
    {
        printf("ltrim ne fonctionne pas\n");
    }


//http://php.net/manual/fr/function.nl2br.php

    char tableauNl2br[20] = "Hello";
    nl2br(tableauNl2br);
    if(strcmp(tableauNl2br, "Hello\n") == 0)
    {
        printf("nl2br fonctionne\n");
        nbPoint++;
    }
    else
    {
        printf("nl2br ne fonctionne pas\n");
    }


//http://php.net/manual/fr/function.str-repeat.php
    char tableauStrRepeat[20] = "YO";
    str_repeat(tableauStrRepeat);
    if(strcmp(tableauStrRepeat, "YOYOYOYOYOYO") == 0)
    {
        printf("str-repeat fonctionne\n");
        nbPoint++;
    }
    else
    {
        printf("str-repeat ne fonctionne pas\n");
    }


//http://php.net/manual/fr/function.str-word-count.php
    char count2[40] = "ceci est un test";
    int count = 1;
    str_word_count(count2, &count);
    if(count == 4)
    {
        printf("str-word-count fonctionne\n");
        nbPoint++;
    }
    else
    {
        printf("str-word-count ne fonctionne pas\n");
    }


//http://php.net/manual/fr/function.strrev.php
    char phrase[20] = "ceci est un test";
    char inverse[20];
    str_rev(phrase, inverse);
    if(strcmp(inverse, "tset nu tse icec") == 0)
    {
        printf("strrev fonctionne\n");
        nbPoint++;
    }
    else
    {
        printf("strrev ne fonctionne pas\n");
    }


//http://php.net/manual/fr/function.strtolower.php
    char minuscule[20] = "MAJUSCULE MAJUSCULE";
    str_tolower(minuscule);
    if(strcmp(minuscule, "majuscule majuscule") == 0)
    {
        printf("strtolower fonctionne\n");
        nbPoint++;
    }
    else
    {
        printf("strtolower ne fonctionne pas\n");
    }


//http://php.net/manual/fr/function.strtoupper.php
    char majuscule[30] = "minuscule minuscule";
    str_toupper(majuscule);
    if(strcmp(majuscule, "MINUSCULE MINUSCULE") == 0)
    {
        printf("strtoupper fonctionne\n");
        nbPoint++;
    }
    else
    {
        printf("strtoupper ne fonctionne pas\n");
    }


//http://php.net/manual/fr/function.trim.php
    char tableauTrim1[20] = "   hello world  ";
    char tableauTrim2[20];
    trim(tableauTrim1, tableauTrim2);
    if(strcmp(tableauTrim2, "hello world") == 0)
    {
        printf("trim fonctionne\n");
        nbPoint++;
    }
    else
    {
        printf("trim ne fonctionne pas\n");
    }


//http://php.net/manual/fr/function.ucfirst.php
    char tableauUcfirst[20] = "hello";
    ucfirst(tableauUcfirst);
    if(strcmp(tableauUcfirst, "Hello") == 0)
    {
        printf("ucfirst fonctionne\n");
        nbPoint++;
    }
    else
    {
        printf("ucfirst ne fonctionne pas\n");
    }


//http://php.net/manual/fr/function.ucwords.php
    char tableauUcwords[20] = "hello world";
    ucwords(tableauUcwords);
    if(strcmp(tableauUcwords, "Hello World") == 0)
    {
        printf("ucwords fonctionne\n");
        nbPoint++;
    }
    else
    {
        printf("ucwords ne fonctionne pas\n");
    }


//http://php.net/manual/fr/function.wordwrap.php
    char tableauWordwrap1[20] = "Hello world";
    char tableauWordwrap2[20], tableauWordwrap3[20];
    wordwrap(tableauWordwrap1, tableauWordwrap2, tableauWordwrap3);
    if(strcmp(tableauWordwrap2, "Hello") == 0)
    {
      if(strcmp(tableauWordwrap3, "world") == 0)
      {
        printf("wordwrap fonctionne\n");
        nbPoint++;
      }
    }
    else
    {
        printf("wordwrap ne fonctionne pas\n");
    }

    //score final
    printf("\nScore : %d. \n", nbPoint);
    return 0;
}
