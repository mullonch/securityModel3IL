#include <stdlib.h>
#include <stdio.h>
#include <string.h>

void main(int argc, char *argv[]) {
    char* mem = malloc(sizeof(char) * 31);

    char* status = &mem[30];
    *status = 'F';

    char* username = &mem[0];
    char* password = &mem[15];

    strcpy(username, argv[1]);
    strcpy(password, argv[2]);

    for (int i=0; i<31; i++)
        printf("%c", mem[i]);
    printf("\n");

    if (argc == 3 && strcmp(username, "admin") == 0 && strcmp(password, "password") == 0)
        *status = 'T';

    if (*status == 'T')
        printf("OK");
    else
        printf("KO");
}