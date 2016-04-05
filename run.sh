
SEPARATOR="-----------------------------------"

echo "$SEPARATOR-----------------------------------"
echo "Populating Database"
echo "$SEPARATOR-----------------------------------"
time  php populate-db.php
echo ""
echo ""

echo "$SEPARATOR"
echo "Lazy loading example"
echo "$SEPARATOR"
time php lazy-loading.php
echo ""
echo ""

echo "$SEPARATOR"
echo "Multi-step hydration example"
echo "$SEPARATOR"
time php multi-step-hydration.php
echo ""
echo ""

echo "$SEPARATOR"
echo "Partial multi-step hydration example"
echo "$SEPARATOR"
time php partial-hydration.php
echo ""
echo ""

echo "$SEPARATOR"
echo "Single fetch-join example"
echo "$SEPARATOR"
time php single-fetch-join.php
echo ""
echo ""