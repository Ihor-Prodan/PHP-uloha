# Kaluza (Puddle Finder) Algorithm

## Overview
The **Kaluza (Puddle Finder)** project is a PHP-based application that detects and calculates the number of distinct puddles within a 2D grid. Each puddle is represented by adjacent cells with a value of `1`, and the program counts these clusters and determines the size of the largest puddle. This project uses a **Depth-First Search (DFS)** algorithm to explore connected cells in multiple directions, identifying distinct puddles and their sizes.

## Features
- **Detects Distinct Puddles**: Counts separate clusters of adjacent `1`s in a grid, where each cluster represents a puddle.
- **Calculates Puddle Sizes**: Determines the size of each puddle and tracks the largest puddle found.
- **Flexible Grid Input**: Accepts a customizable 2D grid of any size, allowing the user to define various grid configurations.
- **DFS-Based Exploration**: Uses Depth-First Search to efficiently explore connected cells in multiple directions.

## Technologies Used

### PHP
- **Object-Oriented Design**: The application is structured with a `Kaluza` class, encapsulating the grid data and algorithm logic.
- **Recursive DFS Implementation**: A recursive DFS-based search (`dfsSearch` method) explores adjacent cells, checking for connected parts of each puddle.
- **Grid Representation**: Uses a 2D array to represent the input grid, where each cell can either be part of a puddle (`1`) or dry land (`0`).
- **Dynamic Tracking of Puddles**: The application dynamically tracks which cells have been checked using a secondary 2D array (`isChecked`), ensuring no cell is double-counted.

### Algorithm
- **Depth-First Search (DFS)**: The DFS-based search algorithm starts at each unvisited `1` cell and recursively explores all its connected cells. 
- **Multi-Directional Search**: Checks eight possible directions (up, down, left, right, and all diagonals), allowing for contiguous detection in all directions.
- **Puddle Counting and Size Calculation**: Each new starting `1` cell marks the beginning of a new puddle, incrementing the puddle count, and each DFS traversal calculates the size of the puddle.

## Conclusion
The Kaluza project demonstrates an effective approach to identifying and measuring clusters in a 2D grid using DFS. This application can be particularly useful for analyzing spatial data where clusters or regions need to be identified. With flexible grid input and multi-directional DFS, the project efficiently detects and sizes puddles, providing insights into the number of clusters and their sizes. The `Kaluza` class can be extended for more complex applications that involve connected component analysis.
