# Gym App

Booking and classes management using Hexagonal Architecture and DDD


To start:
```bash
docker-compose up -d --build
```

> Go to http://localhost:8000

Notes:

- Main code is in `src/` folder. 
    - There is just one context, `Bookings` 
- In `apps/` folder there are the main apps where this backend is provinding:
    - The Owner App: Where studio owners can create classes.
    - The Member App: Where members can create bookings for the classes. 
- Notice this is not a real production product.
- There is no database, everything is stored in runtime memory.
