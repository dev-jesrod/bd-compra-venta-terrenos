# Estándar de Diseño: Maz Terrenos

Este documento sirve como la guía de estilos oficial para el proyecto **Maz Terrenos**. Todos los nuevos componentes, vistas y modificaciones visuales deben ceñirse estrictamente a estas especificaciones de color, tipografía e idioma.

---

## 1. Tipografía

El sitio web utiliza una tipografía moderna, limpia y de excelente legibilidad en pantalla:

* **Fuente Principal**: **`Work Sans`** (cargada directamente desde Google Fonts en el layout global).
* **Configuración Tailwind**:
  * Utilidad: `font-sans` o `font-display` (apuntan por defecto a `Work Sans`).
  * Estilos de letra: `font-light` (300), `font-normal` (400), `font-medium` (500), `font-semibold` (600), `font-bold` (700), `font-extrabold` (800), `font-black` (900).

---

## 2. Paleta de Colores Estandarizada

Toda la aplicación utiliza un conjunto unificado de tokens de color que están registrados en la configuración central de Tailwind. **Queda estrictamente prohibido usar valores hexadecimales inline (`style="color: ..."`) o colores personalizados ad-hoc en las clases (`text-[#...]`).**

### Verde de la Marca (Brand Green & Primary)
* **Código Hexadecimal**: **`#228b22`** (verde bosque natural, ecológico y vibrante).
* **Clases de Utilidad Tailwind**:
  * `text-brand-green` / `text-primary`: Para títulos de marca, enlaces destacados e iconos importantes.
  * `bg-brand-green` / `bg-primary`: Para botones principales, elementos destacados y fondos de marca.
  * `border-brand-green`: Para bordes y elementos de enfoque de campos de formulario.

### Fondo Principal Claro
* **Código Hexadecimal**: **`#f8f8ff`** (GhostWhite, un blanco muy sutil y limpio que reduce la fatiga visual).
* **Clases de Utilidad Tailwind**:
  * `bg-background-light`: Debe aplicarse siempre en el contenedor principal o cuerpo del layout para lograr el tono exacto del fondo del sitio.

---

## 3. Idioma y Traducciones

* **Idioma Oficial**: **Español**.
* **Lógica del Sistema**: Todos los controladores y plantillas Blade deben usar de forma predeterminada el idioma español.
* **Archivos `.env`**:
  ```env
  APP_LOCALE=es
  APP_FALLBACK_LOCALE=es
  APP_FAKER_LOCALE=es_ES
  ```
* **Textos Hardcodeados**: Queda prohibido ingresar textos en inglés (como *Sign In*, *Featured*, *Search*) en las vistas públicas. Toda nueva cadena de texto en las interfaces debe estar en español o usar el sistema de localización de Laravel (`__('traduccion')`).
