import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Random;

class Pelicula {
    String titulo;
    String director;
    int edadMinima;

    public Pelicula(String titulo, String director, int edadMinima) {
        this.titulo = titulo;
        this.director = director;
        this.edadMinima = edadMinima;
    }
}

class Espectador {
    String nombre;
    int edad;
    double dinero;
    boolean tarjetaDescuento;

    public Espectador(String nombre, int edad, double dinero, boolean tarjetaDescuento) {
        this.nombre = nombre;
        this.edad = edad;
        this.dinero = dinero;
        this.tarjetaDescuento = tarjetaDescuento;
    }
}

class Asiento {
    String etiqueta;
    boolean ocupado;

    public Asiento(String etiqueta) {
        this.etiqueta = etiqueta;
        this.ocupado = false;
    }
}

interface MejorVersion {
    boolean cumpleCondiciones(Espectador espectador);
}

class Cine implements MejorVersion {
    Pelicula peliculaActual;
    Asiento[][] sala;
    List<Espectador> espectadores;
    double totalRecaudado;

    public Cine(int filas, int columnas, List<Pelicula> peliculas) {
        this.peliculaActual = seleccionarPelicula(peliculas);
        this.sala = new Asiento[filas][columnas];
        inicializarSala(filas, columnas);
        this.espectadores = new ArrayList<>();
        this.totalRecaudado = 0;
    }

    private void inicializarSala(int filas, int columnas) {
        for (int i = 0; i < filas; i++) {
            for (int j = 0; j < columnas; j++) {
                sala[i][j] = new Asiento((filas - i) + " " + (char) ('A' + j));
            }
        }
    }

    private Pelicula seleccionarPelicula(List<Pelicula> peliculas) {
        Random random = new Random();
        int prob = random.nextInt(100);
        if (prob < 50) return peliculas.get(0); // Joker
        else if (prob < 62.5) return peliculas.get(1); // El Pianista
        else if (prob < 75) return peliculas.get(2); // El Señor de los Anillos
        else if (prob < 87.5) return peliculas.get(3); // El Caballero Oscuro
        else return peliculas.get(4); // Smile
    }

    public void generarEspectadores() {
        String[] nombres = {"Mateo", "Martín", "Lucas", "Leo", "Daniel", "Alejandro", "Manuel", "Pablo", "Álvaro", "Adrián", "Mario", "Diego", "David", "Bruno", "Juan", "Pedro", "Gabriel", "Sofía", "Martina", "María", "Julia", "Paula", "Valeria", "Emma", "Carmen", "Olivia", "Celia", "Irene", "Marta", "Laura", "Gema", "Lola", "Jimena", "Claudia"};
        Random random = new Random();

        for (int i = 0; i < 34; i++) {
            String nombre = nombres[random.nextInt(nombres.length)];
            int edad = random.nextInt(41) + 8;
            double dinero = 2 + (18 * random.nextDouble());
            boolean tarjetaDescuento = random.nextInt(100) < 25;
            espectadores.add(new Espectador(nombre, edad, dinero, tarjetaDescuento));
        }
    }

    public void mostrarEspectadores() {
        System.out.println("Espectadores generados:");
        for (Espectador espectador : espectadores) {
            System.out.printf("Nombre: %s, Edad: %d, Dinero: %.2f, %s\n",
                espectador.nombre, espectador.edad, espectador.dinero,
                espectador.tarjetaDescuento ? "Con tarjeta de descuento" : "Sin tarjeta de descuento");
        }
    }

    public void simularAsientos() {
        int rechazos = 0;
        for (Espectador espectador : espectadores) {
            if (espectador.edad < peliculaActual.edadMinima || !puedePagar(espectador)) {
                rechazos++;
                continue;
            }
            Asiento asientoLibre = buscarAsientoLibre();
            if (asientoLibre != null) {
                asignarAsiento(asientoLibre, espectador);
            }
        }
        double porcentajeRechazo = (rechazos / (double) espectadores.size()) * 100;
        System.out.printf("%d personas no tenían suficiente dinero o no cumplían los requisitos de edad. Es decir, %.2f%%\n", rechazos, porcentajeRechazo);
        System.out.printf("Dinero total recaudado: %.2f euros\n", totalRecaudado);
    }

    private boolean puedePagar(Espectador espectador) {
        double precio = espectador.tarjetaDescuento ? 5 : (espectador.edad >= 18 && espectador.edad <= 35 ? 3.5 : 7);
        if (espectador.dinero >= precio) {
            totalRecaudado += precio;
            return true;
        }
        return false;
    }

    private Asiento buscarAsientoLibre() {
        for (int i = 0; i < sala.length; i++) {
            for (int j = 0; j < sala[i].length; j++) {
                if (!sala[i][j].ocupado) {
                    return sala[i][j];
                }
            }
        }
        return null;
    }

    private void asignarAsiento(Asiento asiento, Espectador espectador) {
        asiento.ocupado = true;
        System.out.println("Espectador " + espectador.nombre + " sentado en " + asiento.etiqueta);
    }

    @Override
    public boolean cumpleCondiciones(Espectador espectador) {
        return espectador.dinero >= 12 && (espectador.edad < 18 || espectador.edad > 35);
    }

    public void mostrarCumplenCondiciones() {
        List<Espectador> cumplen = new ArrayList<>();
        int sumaEdades = 0;
        System.out.println("\nEspectadores que cumplen las condiciones:");
        for (Espectador espectador : espectadores) {
            if (cumpleCondiciones(espectador)) {
                cumplen.add(espectador);
                sumaEdades += espectador.edad;
                System.out.println("Nombre: " + espectador.nombre);
            }
        }
        if (!cumplen.isEmpty()) {
            double mediaEdad = sumaEdades / (double) cumplen.size();
            System.out.printf("La media de edad de quienes cumplen es: %.2f\n", mediaEdad);
        }
    }
}

public class Main {
    public static void main(String[] args) {
        List<Pelicula> peliculas = Arrays.asList(
            new Pelicula("Joker", "Todd Phillips", 18),
            new Pelicula("El pianista", "Roman Polanski", 13),
            new Pelicula("El señor de los anillos, El retorno del rey", "Peter Jackson", 13),
            new Pelicula("El caballero oscuro", "Christopher Nolan", 13),
            new Pelicula("Smile", "Parker Finn", 16)
        );

        Cine cine = new Cine(8, 9, peliculas);
        cine.generarEspectadores();
        cine.mostrarEspectadores(); // Muestra los espectadores generados
        cine.simularAsientos();
        cine.mostrarCumplenCondiciones(); // Muestra los nombres de los que cumplen condiciones
    }
}
