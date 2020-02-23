#include <stdio.h>
#include <string.h>
#include <time.h>
#include <math.h>

char* implode(char* resultat, char* phrase)
{
    int i = 0;
    int j = 0;

    while(resultat[i] != 0)
    {
        i++;
    }
    resultat[i] = ' ';
    while(phrase[j] != 0)
    {
        resultat[i+1] = phrase[j];
        i++;
        j++;
    }

    return resultat;
}

char* lcfirst(char* str)
{
    *str = *str + ('a' - 'A');
    return str;
}

char* ltrim(char* phrase1, char* phraseModif)
{
    int j = 0;
    int i = 0;
    while(phrase1[i] == ' ')
    {
        i++;
    }

    while(phrase1[i] != '\0')
    {
        phraseModif[j] = phrase1[i];
        i++;
        j++;
    }
    phraseModif[j] = '\0';

    return phraseModif;
}

char* nl2br(char* phrase)
{
    strcat(phrase, "\n");

    return phrase;
}


char* str_repeat(char* multipl)
{
    char repeat[20];
    strcpy(repeat, multipl);
    for(int i = 0 ; i != 5 ; i++)
    {
        strcat(multipl, repeat);
    }

    return multipl;
}


int* str_word_count(char* phrase, int* compte)
{
int j = 1;
for (int i = 0; i != strlen(phrase); i++){
 if (phrase[i] == ' ' || phrase[i] == '\t' || phrase[i] == '\n' || phrase[i] == '\x0B')
 {
   j++;
 }
}

*compte = j;

return compte;
}


char* str_rev(char* phrase, char* phraseModif)
{
  int j = 0;
  int i = 0;
  while(phrase[j] != '\0')
  {
    j++;
  }
while(phrase[i] != '\0')
{
  phraseModif[j-1] = phrase[i];
  i++;
  j--;
}
phraseModif[i] = '\0';

  return phraseModif;
}


char* str_tolower(char* minuscule)
{
for(int i = 0 ; minuscule[i] != '\0' ; i++)
{
  if(minuscule[i] >= 'A' && minuscule[i] <= 'Z')
  {
    minuscule[i] = minuscule[i] + 32;
  }
}

  return minuscule;
}


char* str_toupper(char* majuscule)
{
for(int i = 0 ; majuscule[i] != '\0' ; i++)
{
  if(majuscule[i] >= 'a' && majuscule[i] <= 'z')
  {
    majuscule[i] = majuscule[i] - 32;
  }
}

  return majuscule;
}


char* trim(char* phrase, char* phraseSansEspace)
{
int j = 0;
int i = 0;
int h = strlen(phrase) - 1;
while(phrase[i] == ' ')
{
  i++;
}
while(phrase[h] == ' ')
{
  h--;
}
while(phrase[i] != phrase[h])
{
  phraseSansEspace[j] = phrase[i];
  i++;
  j++;
}
phraseSansEspace[j] = phrase[h];
phraseSansEspace[j+1] = '\0';

  return phraseSansEspace;
}


char* ucfirst(char* phrase)
{
*phrase = *phrase - 32;

  return phrase;
}


char* ucwords(char* phrase)
{
phrase[0] = phrase[0] - 32;
for(int i = 0 ; phrase[i] != '\0' ; i++)
{
  if(phrase[i] == ' ')
  {
    phrase[i+1] = phrase[i+1] -32;
  }
}
  return phrase;
}


void wordwrap(char* mot1, char* prendLeMot1, char* mot2)
{
int i = 0;
int j = 0;
while(mot1[i] != ' ')
{
  prendLeMot1[i] = mot1[i];
  i++;
}
prendLeMot1[i] = '\0';

while(mot1[i] != '\0')
{
  mot2[j] = mot1[i+1];
  i++;
  j++;
}
mot2[j] = '\0';

}
