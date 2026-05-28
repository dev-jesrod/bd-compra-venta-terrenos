# Skill: Arquitectura Laravel y UI Semántica (AppTerrenos)

## 🎯 Contexto del Proyecto

AppTerrenos es una plataforma transaccional de compra-venta de propiedades desarrollada en Laravel. El sistema exige un estricto control de concurrencia en la base de datos (prevención de doble venta) y un código frontend extremadamente limpio y escalable.

## 📁 Estructura del Proyecto (No reinventar la rueda)

- **Modelos:** `app/Models/` (Deben contener los Local Scopes y relaciones).
- **Controladores:** `app/Http/Controllers/` (Divididos lógicamente en `/Vendedor`, `/Cliente`, y públicos).
- **Vistas:** `resources/views/` (Agrupadas por dominio, usando subcarpetas y componentes Blade en `components/`).
- **Rutas:** Centralizadas en `routes/web.php`.

## ⚙️ Reglas Estrictas de Backend (PHP/Laravel)

1. **Modelos Inteligentes, Controladores Delgados:** Está prohibido hacer consultas genéricas como `Terreno::all()`. Toda regla de negocio recurrente debe ser un Local Scope en el modelo (ej. `scopeApproved()`, `scopeAvailable()`).
2. **Concurrencia Obligatoria (Motor Transaccional):** Cualquier controlador que procese una compra, reserva o altere el estado financiero de un terreno, DEBE envolver su lógica en un `DB::transaction()`. Se debe utilizar `lockForUpdate()` para bloquear la fila en InnoDB y prevenir Condiciones de Carrera.
3. **Validación:** Evitar el uso de validaciones sueltas en el controlador si exceden las 3 reglas. Extraer la lógica usando `php artisan make:request`.
4. **Protección de Datos:** Las búsquedas por ID público deben utilizar obligatoriamente `findOrFail()` para retornar errores 404 automáticos en lugar de exponer excepciones 500.

## 🎨 Reglas Estrictas de Frontend (Blade & UI)

1. **Cero Tailwind (Prohibición Absoluta):** Toda la maquetación debe realizarse utilizando clases de CSS puro, modular y reutilizable.
2. **HTML Semántico Obligatorio:** Queda prohibido el uso excesivo de `<div>`. Se debe estructurar la interfaz utilizando etiquetas con significado real: `<article>` para tarjetas de terreno, `<section>`, `<figure>` para galerías, `<header>`, `<footer>` y `<dl>` para listas de detalles.
3. **Vanilla JavaScript:** Para interacciones simples del DOM (como deshabilitar el botón de `submit` en el checkout para evitar doble clic), se debe usar JavaScript puro (`btn.disabled = true`). No incluir frameworks reactivos pesados.
4. **DRY en Blade:** Cualquier bloque de código HTML que se repita más de una vez (como las tarjetas de propiedades o los logotipos) debe extraerse a un componente `<x-nombre-componente>`.
