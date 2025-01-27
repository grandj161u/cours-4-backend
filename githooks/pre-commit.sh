#!/bin/bash

echo "Running pre-commit hooks..."

# Run the test script
./test.sh

# Store the exit code
EXIT_CODE=$?

# Exit with the test script's exit code
exit $EXIT_CODE