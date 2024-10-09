---
title: "Using Spring Data to Abstract Data Sources (Spanner and Biquery JDBC)"
date: 2024-07-26T15:37:58-07:00
draft: false
---

Most software engineering practioners that use Spring will be aware of the power of abstraction that Spring Data
can provides to greatly reduce time taken and the amount of code necessary to interact with an application's database.
Most will probably also realize that the abstraction provides a degree of freedom in shifting to different data sources
with minimal amount of code changes (generally importing a different dependency and potentially some modifications to
the entity/POJO classes that are used to define the structure in the database). But what about using multiple Spring Data
data sources in the same application that reuse much of the entity/POJO classes to efficiently provide access to different 
databases that serve different business use cases, such as fast paths of data access for hot data and slower paths for historical data? 
Maybe we need to store recent data in a database with faster access, and older data in a cheaper (slower) database (and maybe 
the database we select for our fast access doesn't have the ability to run on cheaper, slower spinning disks). Using Spring Data 
Spanner (using an underlying JPA implementation) and Spring Data JDBC with a JDBC library for GCP BigQuery, we can serve up a 
consistent interface to our application (latency witholding) to our application data while preserving all the great benefits
we get from Spring Data, as we'll see below.
