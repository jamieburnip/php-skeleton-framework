#!/bin/bash
 
i=1
class_coverage=80
method_coverage=80
line_coverage=80
 
while read line; do    
    if [[ $line =~ [0-9\.-]+ ]]; then
        if [[ "$i" -eq "2" ]] && [[ "$BASH_REMATCH" < "$class_coverage" ]] ; then
            echo -e "Error: Test Coverage of Classes is below target at $BASH_REMATCH% ($class_coverage%)"
            #exit 0; # todo update this to exit 1
        elif [[ "$i" -eq "3" ]] && [[ "$BASH_REMATCH" < "$method_coverage" ]] ; then
            echo -e "Error: Test Coverage of Methods is below target at $BASH_REMATCH% ($method_coverage%)"
            #exit 0; # todo update this to exit 1
        elif [[ "$i" -eq "4" ]] && [[ "$BASH_REMATCH" < "$line_coverage" ]] ; then
            echo -e "Error: Test Coverage of Lines is below target at $BASH_REMATCH% ($line_coverage%)"
            #exit 0; # todo update this to exit 1
        fi
        i=$(( i + 1 ))
    fi
done < reports/code_coverage.txt

if [[ $i < 4 ]]; then
    echo -e "Error: Unlikely to have read through enough code coverage stats. Only found $i lines"
    exit 1;
fi

exit 0
