!/bin/bash

GREEN='\033[0;32m'
RED='\033[0;31m'
NC='\033[0m'

echo "Starting test suite execution..."

echo -e "\n${GREEN}Running PHP Code Sniffer...${NC}"
if ! docker compose run --rm php vendor/bin/phpcs; then
    echo -e "${RED}PHP Code Sniffer failed!${NC}"
    exit 1
fi

echo -e "\n${GREEN}Running PHPStan...${NC}"
if ! docker compose run --rm php vendor/bin/phpstan analyse; then
    echo -e "${RED}PHPStan analysis failed!${NC}"
    exit 1
fi

echo -e "\n${GREEN}Running PHPUnit tests...${NC}"
if ! docker compose run --rm php bin/phpunit; then
    echo -e "${RED}PHPUnit tests failed!${NC}"
    exit 1
fi

echo -e "\n${GREEN}All tests passed successfully!${NC}"
exit 0