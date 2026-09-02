<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';



use App\Entity\CopieExamen;

echo "=== TEST PARTIE 2 ===\n\n";

// Test 1 : copie sans pénalité
$copie = new CopieExamen(
    '2026-09-01',
    15,
    false,
    '2026-09-01'
);

echo "Note brute : " . $copie->getNoteBrute() . "\n";
echo "Note finale : " . $copie->getNoteFinale() . "\n\n";

// Test 2 : copie avec pénalité
$copieEnRetard = new CopieExamen(
    '2026-09-02',
    15,
    true,
    '2026-09-01'
);

echo "Note brute : " . $copieEnRetard->getNoteBrute() . "\n";
echo "Note finale : " . $copieEnRetard->getNoteFinale() . "\n\n";

// Test 3 : note invalide
try {
    $copieInvalide = new CopieExamen(
        '2026-09-01',
        21,
        false,
        '2026-09-01'
    );
} catch (\InvalidArgumentException $e) {
    echo "Erreur détectée : " . $e->getMessage() . "\n";
}