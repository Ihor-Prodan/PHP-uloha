<?php
class Kaluza {
    private array $grid;
    private int $rows;
    private int $colums;
    private array $isChecked;

    public function __construct(array $grid) {
        $this->grid = $grid;
        $this->rows = count($grid);
        $this->colums = count($grid[0]);
        $this->isChecked = array_fill(0, $this->rows, array_fill(0, $this->colums, false));
    }

    public function findKaluze(): array {
        $maxSize = 0;
        $numberKaluze = 0;

        for ($i = 0; $i < $this->rows; $i++) {
            for ($j = 0; $j < $this->colums; $j++) {
                if ($this->grid[$i][$j] == 1 && !$this->isChecked[$i][$j]) {
                    $size = $this->dfsSearch($i, $j);
                    $numberKaluze++;
                    $maxSize = max($maxSize, $size);
                }
            }
        }

        return [$numberKaluze, $maxSize];
    }

    private function dfsSearch(int $x, int $y): int {
        $directions = [
            [-1, 0], [1, 0], [0, -1], [0, 1],
            [-1, -1], [-1, 1], [1, -1], [1, 1]
        ];

        $cellsToCheked = [[$x, $y]];
        $this->isChecked[$x][$y] = true;
        $size = 0;

        while (!empty($cellsToCheked)) {
            [$cx, $cy] = array_pop($cellsToCheked);
            $size++;

            foreach ($directions as $dir) {
                $nx = $cx + $dir[0];
                $ny = $cy + $dir[1];

                if ($nx >= 0 && $nx < $this->rows && $ny >= 0 && $ny < $this->colums 
                    && $this->grid[$nx][$ny] == 1 && !$this->isChecked[$nx][$ny]) {
                    $this->isChecked[$nx][$ny] = true;
                    array_push($cellsToCheked, [$nx, $ny]);
                }
            }
        }

        return $size;
    }
}

// Príklad použitia
$newGrid = [
  [0, 0, 0, 0, 0],
  [1, 1, 0, 0, 1],
  [0, 1, 0, 0, 0],
  [1, 1, 1, 0, 1],
  [0, 1, 0, 1, 0]
];

$kaluze = new Kaluza($newGrid);
list($numberKaluze, $maxSize) = $kaluze->findKaluze();

echo "Číslo kaluže: " . $numberKaluze . "<br>"; 
echo "Veľkosť najväčšej kaluže: " . $maxSize;
?>