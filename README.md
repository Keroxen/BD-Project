Project Overview: Games Database Management System and presentation website

This project features a database system and an informative website that catalogs data and images related to video games, developers, publishers, digital distribution platforms, film adaptations, and more.

Technologies used:

    Front-end: HTML, CSS, Bootstrap 4
    Back-end: PHP
    Database: MySQL

Key Features:

    Games Entity: Stores general information about video games, including title, genre, modes, and release date.
    Developers and Publishers Entities: Contain details about the companies that developed and published the games.
    Relationships: Establishes connections between entities, such as developers and games, publishers and games, CEOs and developers/publishers, and more.
    Film Adaptations Entity: Tracks details about film adaptations related to certain games.
    Platforms Entity: Manages information about the platforms where games are available.

Database Structure:

    Ten entities with specific attributes.
    Entity-Relationship Diagram showcasing the relationships between entities.
    SQL structure examples for entities like games, developers, publishers, film adaptations, platforms, CEOs, etc.

Queries Examples:

    Insert Query: Insert a new game and associate it with data from other tables and its corresponding media files.
    Delete Query: Delete a game and its associated data.
    Union Query: Retrieve headquarters information from both developers and publishers.
    Distinct Union Query: Display unique names from both developers and publishers.
    Selection Query: Retrieve game titles and release dates for games based on an ID.
    Projection Query: Obtain names and creators of film adaptations available on a platform.
    Join Query: Retrieve IDs and names of companies that function as both developers and publishers.


Database Normalization:
     
    Achieved First Normal Form (FN1) by modifying the 'game' table structure.
    Second Normal Form (FN2) achieved by extracting non-prime attributes into separate tables.
    Third Normal Form (FN3) by eliminating columns dependent on non-primary key attributes.
    Fourth Normal Form (FNBC) maintained without further modifications.

Project Phases:

    Schema Design: Developed the entity-relationship diagram and established table relationships.
    Table Creation: Implemented database tables for games, developers, publishers, film adaptations, platforms, CEOs, etc.
    Data Population: Populated the tables with relevant data.
    Queries execution: Executed different queris on the database to showcase the relationships between the tables.
