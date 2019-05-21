#include <stdlib.h>
#include <stdio.h>
#include <string.h>

void main(int argc, char *argv[]) {
    if (argc == 3 && strcmp(argv[1], "admin") == 0 && strcmp(argv[2], "password") == 0) {
        printf("OK");
    } else {
        printf("KO");
    }
}