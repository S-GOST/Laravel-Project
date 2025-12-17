<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientesModelo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Mostrar lista de clientes (para administración)
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = ClientesModelo::query();

        if($search){
            $query->where(function($q) use ($search){
                $q->where('ID_CLIENTES', 'LIKE', "%{$search}%")
                  ->orWhere('Ubicacion', 'LIKE', "%{$search}%")
                  ->orWhere('Nombre', 'LIKE', "%{$search}%")
                  ->orWhere('TipoDocumento', 'LIKE', "%{$search}%")
                  ->orWhere('Telefono','LIKE', "%{$search}%")
                  ->orWhere('Correo','LIKE', "%{$search}%")
                  ->orWhere('usuario','LIKE', "%{$search}%");
            });
        }
        
        $datos = $query->orderBy('ID_CLIENTES', 'desc')->paginate(10);
        return view("Clientes.clientes")->with("datos", $datos);
    }

    /**
     * Mostrar formulario para crear cliente
     */
    public function create()
    {
        return view('Clientes.create');
    }

    /**
     * Almacenar nuevo cliente
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nombre' => 'required|string|max:255',
            'TipoDocumento' => 'required|string|max:20',
            'Correo' => 'required|email|max:255|unique:clientes,Correo',
            'Telefono' => 'nullable|string|max:20',
            'Ubicacion' => 'nullable|string|max:255',
            'usuario' => 'nullable|string|max:50|unique:clientes,usuario',
            'password' => 'nullable|string|min:6',
        ]);

        // Hashear la contraseña si se proporciona
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        ClientesModelo::create($validated);

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente creado exitosamente');
    }

    /**
     * Mostrar cliente específico
     */
    public function show($id)
    {
        $cliente = ClientesModelo::where('ID_CLIENTES', $id)->firstOrFail();
        return view('Clientes.show', compact('cliente'));
    }

    /**
     * Mostrar formulario para editar cliente
     */
    public function edit($id)
    {
        $cliente = ClientesModelo::where('ID_CLIENTES', $id)->firstOrFail();
        return view('Clientes.edit', compact('cliente'));
    }

    /**
     * Actualizar cliente
     */
    public function update(Request $request, $id)
    {
        $cliente = ClientesModelo::where('ID_CLIENTES', $id)->firstOrFail();

        $validated = $request->validate([
            'Nombre' => 'required|string|max:255',
            'TipoDocumento' => 'required|string|max:20',
            'Correo' => 'required|email|max:255|unique:clientes,Correo,' . $id . ',ID_CLIENTES',
            'Telefono' => 'nullable|string|max:20',
            'Ubicacion' => 'nullable|string|max:255',
            'usuario' => 'nullable|string|max:50|unique:clientes,usuario,' . $id . ',ID_CLIENTES',
            'password' => 'nullable|string|min:6',
        ]);

        // Si se proporciona nueva contraseña
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']); // No actualizar si está vacía
        }

        $cliente->update($validated);

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente actualizado exitosamente');
    }

    /**
     * Eliminar cliente
     */
    public function destroy($id)
    {
        $cliente = ClientesModelo::where('ID_CLIENTES', $id)->firstOrFail();
        $cliente->delete();

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente eliminado exitosamente');
    }

    /**
     * Ver motos de un cliente específico (para administrador)
     */
    public function verMotosCliente($id)
    {
        $cliente = ClientesModelo::where('ID_CLIENTES', $id)->firstOrFail();
        
        // Obtener motos del cliente
        $motos = $cliente->motos ?? collect();
        
        return view('Clientes.vermotosCliente', compact('cliente', 'motos'));
    }

    /**
     * Ver las motos del cliente autenticado (área cliente)
     */
    public function verMisMotos()
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        $motos = $cliente->motos ?? collect();
        
        return view('clientes.mis-motos', compact('cliente', 'motos'));
    }

    /**
     * Login del cliente
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'usuario' => 'required|string',
            'contrasena' => 'required|string',
        ]);

        if (Auth::guard('cliente')->attempt([
            'usuario' => $credentials['usuario'],
            'password' => $credentials['contrasena'],
        ])) {
            $request->session()->regenerate();
            return redirect()->route('cliente.panel');
        }

        return back()->withErrors([
            'usuario' => 'Usuario o contraseña incorrectos.',
        ]);
    }

    /**
     * Dashboard del cliente (área privada)
     */
    public function dashboard(Request $request)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        
        $datosDashboard = [
            'ordenes_activas' => 3,
            'proxima_cita' => '15 de Mayo, 10:00 AM',
            'servicios_realizados' => 24,
            'valoracion' => 4.8,
        ];
        
        return view('clientes.dashboard', compact('cliente', 'datosDashboard'));
    }

    public function panel()
    {
        $cliente = Auth::guard('cliente')->user();
        return view('cliente.panel', compact('cliente'));
    }

    /**
     * Perfil del cliente
     */
    public function perfil(Request $request)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        return view('clientes.perfil', compact('cliente'));
    }

    /**
     * Actualizar perfil del cliente
     */
    public function actualizarPerfil(Request $request)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        
        $validated = $request->validate([
            'Nombre' => 'required|string|max:255',
            'Correo' => 'required|email|max:255|unique:clientes,Correo,' . $cliente->ID_CLIENTES . ',ID_CLIENTES',
            'Telefono' => 'nullable|string|max:20',
            'Ubicacion' => 'nullable|string|max:255',
        ]);
        
        $cliente->update($validated);
        
        return redirect()->route('cliente.perfil')
            ->with('success', 'Perfil actualizado correctamente');
    }

    /**
     * Crear nueva orden (vista)
     */
    public function nuevaOrden(Request $request)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        return view('clientes.orden.nueva', compact('cliente'));
    }

    /**
     * Crear nueva orden (proceso)
     */
    public function crearOrden(Request $request)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $validated = $request->validate([
            'descripcion' => 'required|string|max:500',
            'id_moto' => 'required|exists:motos,ID_MOTOS',
            'servicios' => 'required|array',
            'servicios.*' => 'exists:servicios,ID_SERVICIOS',
        ]);
        
        return redirect()->route('cliente.orden.estado')
            ->with('success', 'Orden creada exitosamente');
    }

    /**
     * Estado de órdenes
     */
    public function estadoOrden(Request $request)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        $ordenes = [];
        
        return view('clientes.orden.estado', compact('cliente', 'ordenes'));
    }

    /**
     * Detalle de orden específica
     */
    public function detalleOrden($id)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        $orden = [];
        
        return view('clientes.orden.detalle', compact('cliente', 'orden'));
    }

    /**
     * Informes del cliente
     */
    public function informes(Request $request)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        return view('clientes.informes', compact('cliente'));
    }

    /**
     * Ver informe específico
     */
    public function verInforme($id)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        return view('clientes.informe.detalle', compact('cliente'));
    }

    /**
     * Historial de servicios
     */
    public function historial(Request $request)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        return view('clientes.historial', compact('cliente'));
    }

    /**
     * Citas del cliente
     */
    public function citas(Request $request)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        return view('clientes.citas', compact('cliente'));
    }

    /**
     * Agendar cita
     */
    public function agendarCita(Request $request)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $validated = $request->validate([
            'fecha' => 'required|date|after:today',
            'hora' => 'required|date_format:H:i',
            'motivo' => 'required|string|max:255',
            'id_moto' => 'required|exists:motos,ID_MOTOS',
        ]);
        
        return redirect()->route('cliente.citas')
            ->with('success', 'Cita agendada exitosamente');
    }

    /**
     * Productos del cliente
     */
    public function productos(Request $request)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        return view('clientes.productos', compact('cliente'));
    }

    /**
     * Servicios del cliente
     */
    public function servicios(Request $request)
    {
        if (!Auth::guard('cliente')->check()) {
            return redirect()->route('cliente.login');
        }
        
        $cliente = Auth::guard('cliente')->user();
        return view('clientes.servicios', compact('cliente'));
    }

    /**
     * Procesar login (alternativo)
     */
    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::guard('cliente')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('cliente.dashboard');
        }
        
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
}