#ifndef PHPLIB_H
#define PHPLIB_H

char* implode(char* resultat, char* phrase);
char* lcfirst(char* str);
char* ltrim(char* phrase1, char* phraseModif);
char* nl2br(char* phrase);
char* str_repeat(char* multipl);
int* str_word_count(char* phrase, int* compte);
char* str_rev(char* phrase, char* phraseModif);
char* str_tolower(char* minuscule);
char* str_toupper(char* majuscule);
char* trim(char* phrase, char* phraseSansEspace);
char* ucfirst(char* phrase);
char* ucwords(char* phrase);
void wordwrap(char* mot1, char* prendLeMot1, char* mot2);

#endif // PHPLIB_H
