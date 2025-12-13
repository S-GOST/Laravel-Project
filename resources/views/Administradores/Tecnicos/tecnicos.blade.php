<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Técnicos</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Colores KTM */
        :root {
            --ktm-orange: #FF6D1F;
            --ktm-orange-light: #ff8a4d;
            --ktm-orange-dark: #cc5600;
            --ktm-dark: #0c0c0c;
            --ktm-darker: #080808;
            --ktm-gray: #111111;
            --ktm-gray-light: #1a1a1a;
            --ktm-gray-border: #2a2a2a;
            --ktm-input-bg: #0a0a0a;
            --ktm-input-border: #333;
        }
        
        /* Eliminar todos los fondos blancos de Bootstrap */
        .bg-white, .bg-light, .bg-body, .bg-transparent {
            background-color: var(--ktm-dark) !important;
        }
        
        .text-dark, .text-body, .text-muted, .text-black, .text-black-50 {
            color: #e0e0e0 !important;
        }
        
        body {
            background: var(--ktm-dark);
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            min-height: 100vh;
        }
        
        /* Sobrescribir estilos por defecto de Bootstrap */
        .form-control, .form-select, .input-group-text, .btn, .modal-content, .alert, .table, 
        .card, .dropdown-menu, .toast, .tooltip, .popover {
            background-color: var(--ktm-gray) !important;
            border-color: var(--ktm-gray-border) !important;
            color: #fff !important;
        }
        
        .modal-header, .modal-footer {
            background-color: var(--ktm-gray-light) !important;
        }
        
        .container-fluid {
            padding: 20px;
            background: var(--ktm-dark);
        }
        
        /* Header Styling KTM */
        .header-section {
            background: linear-gradient(135deg, #0a0a0a 0%, #111111 100%);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            border-left: 4px solid var(--ktm-orange);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }
        
        .header-section:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--ktm-orange), var(--ktm-orange-light));
        }
        
        .header-section h1 {
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            display: inline-block;
        }
        
        .header-section h1:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--ktm-orange);
            box-shadow: 0 0 8px var(--ktm-orange);
        }
        
        .header-section p {
            color: #aaa;
        }
        
        /* Stats Cards KTM */
        .stats-card {
            background: linear-gradient(135deg, #0f0f0f 0%, #151515 100%);
            border-radius: 10px;
            padding: 20px;
            height: 100%;
            border-left: 4px solid var(--ktm-orange);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(255, 109, 31, 0.2);
        }
        
        .stats-card:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 80px;
            height: 80px;
            background: rgba(255, 109, 31, 0.1);
            border-radius: 0 0 0 80px;
        }
        
        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
            background: rgba(255, 109, 31, 0.2);
            color: var(--ktm-orange);
        }
        
        .stats-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--ktm-orange);
            margin: 10px 0;
        }
        
        .stats-label {
            color: #aaa;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* TABLA COMPLETAMENTE NEGRA SIN FONDOS BLANCOS */
        .tabla-ktm {
            background: #000000 !important; /* NEGRO PURO */
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.8);
            border: 2px solid var(--ktm-orange);
            margin: 0;
            position: relative;
            width: 100%;
        }
        
        .tabla-ktm:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--ktm-orange), var(--ktm-orange-light));
        }
        
        .tabla-ktm thead {
            background: #000000 !important; /* NEGRO PURO */
            border-bottom: 3px solid var(--ktm-orange);
        }
        
        .tabla-ktm th {
            border: none;
            padding: 18px 15px;
            font-weight: 700;
            color: var(--ktm-orange) !important;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            text-align: left;
            position: relative;
            background: #000000 !important;
        }
        
        .tabla-ktm th:after {
            content: '';
            position: absolute;
            right: 0;
            top: 20%;
            height: 60%;
            width: 1px;
            background: linear-gradient(to bottom, transparent, var(--ktm-orange), transparent);
        }
        
        .tabla-ktm th:last-child:after {
            display: none;
        }
        
        .tabla-ktm tbody tr {
            background: #000000 !important; /* NEGRO PURO */
            border-bottom: 1px solid rgba(255, 109, 31, 0.2);
            transition: all 0.3s ease;
            position: relative;
        }
        
        .tabla-ktm tbody tr:nth-child(even) {
            background: #0a0a0a !important; /* NEGRO MUY OSCURO */
        }
        
        .tabla-ktm tbody tr:hover {
            background: linear-gradient(90deg, rgba(255, 109, 31, 0.2) 0%, rgba(255, 109, 31, 0.1) 100%) !important;
            transform: translateX(5px);
            box-shadow: inset 4px 0 0 var(--ktm-orange);
        }
        
        .tabla-ktm tbody td {
            padding: 20px 15px;
            color: #ffffff !important; /* TEXTO BLANCO */
            vertical-align: middle;
            border: none;
            font-weight: 500;
            position: relative;
            border-right: 1px solid rgba(255, 109, 31, 0.1);
            background: transparent !important;
        }
        
        .tabla-ktm tbody td:last-child {
            border-right: none;
        }
        
        .tabla-ktm tbody td .acciones-container {
            opacity: 1;
            transform: translateX(0);
            transition: all 0.3s ease;
        }
        
        .tabla-ktm tbody tr:hover .acciones-container {
            transform: scale(1.05);
        }
        
        /* Estilo para el ID del técnico */
        .id-tecnico {
            background: linear-gradient(135deg, rgba(255, 109, 31, 0.2) 0%, rgba(255, 109, 31, 0.1) 100%);
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            color: var(--ktm-orange);
            display: inline-block;
            border: 1px solid rgba(255, 109, 31, 0.3);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        /* Botones KTM */
        .btn-ktm {
            background: linear-gradient(135deg, var(--ktm-orange) 0%, var(--ktm-orange-light) 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 6px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-ktm:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.5s ease;
        }
        
        .btn-ktm:hover:before {
            left: 100%;
        }
        
        .btn-ktm:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 109, 31, 0.4);
            color: white;
        }
        
        .btn-ktm-outline {
            background: transparent;
            border: 2px solid var(--ktm-orange);
            color: var(--ktm-orange);
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 6px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-ktm-outline:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 109, 31, 0.1), transparent);
            transition: all 0.5s ease;
        }
        
        .btn-ktm-outline:hover:before {
            left: 100%;
        }
        
        .btn-ktm-outline:hover {
            background: var(--ktm-orange);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 109, 31, 0.3);
        }
        
        /* Botones de acción pequeños */
        .btn-accion {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: 2px solid;
            margin: 0 3px;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.5);
        }
        
        .btn-editar {
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.3) 0%, rgba(40, 167, 69, 0.1) 100%);
            border-color: #28a745;
            color: #28a745;
        }
        
        .btn-editar:hover {
            background: #28a745;
            color: white;
            transform: translateY(-2px) rotate(5deg);
            box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
        }
        
        .btn-ver {
            background: linear-gradient(135deg, rgba(23, 162, 184, 0.3) 0%, rgba(23, 162, 184, 0.1) 100%);
            border-color: #17a2b8;
            color: #17a2b8;
        }
        
        .btn-ver:hover {
            background: #17a2b8;
            color: white;
            transform: translateY(-2px) scale(1.1);
            box-shadow: 0 4px 10px rgba(23, 162, 184, 0.3);
        }
        
        .btn-eliminar {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.3) 0%, rgba(220, 53, 69, 0.1) 100%);
            border-color: #dc3545;
            color: #dc3545;
        }
        
        .btn-eliminar:hover {
            background: #dc3545;
            color: white;
            transform: translateY(-2px) rotate(-5deg);
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.3);
        }
        
        /* Modal Styling KTM */
        .modal-ktm .modal-content {
            background: linear-gradient(135deg, #111111 0%, #1a1a1a 100%);
            color: #e0e0e0;
            border: 1px solid var(--ktm-gray-border);
            border-radius: 12px;
            border-top: 4px solid var(--ktm-orange);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
            position: relative;
            overflow: hidden;
        }
        
        .modal-ktm .modal-content:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--ktm-orange), var(--ktm-orange-light));
        }
        
        .modal-ktm .modal-header {
            background: linear-gradient(90deg, #0f0f0f 0%, #151515 100%);
            border-bottom: 1px solid var(--ktm-gray-border);
            border-radius: 12px 12px 0 0;
            padding: 20px;
            position: relative;
        }
        
        .modal-ktm .modal-header:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--ktm-orange);
            box-shadow: 0 0 10px var(--ktm-orange);
        }
        
        .modal-ktm .modal-title {
            color: var(--ktm-orange);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .modal-ktm .modal-body {
            padding: 25px;
            background: linear-gradient(135deg, #0f0f0f 0%, #151515 100%);
            position: relative;
        }
        
        .modal-ktm .modal-footer {
            background: #0f0f0f;
            border-top: 1px solid var(--ktm-gray-border);
            border-radius: 0 0 12px 12px;
            padding: 20px;
        }
        
        .modal-ktm .btn-close {
            filter: invert(1) grayscale(100%) brightness(200%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }
        
        .modal-ktm .btn-close:hover {
            opacity: 1;
            transform: rotate(90deg);
        }
        
        /* INPUTS Y SELECTS ESTILO KTM - OSCURO COMPLETO */
        .input-ktm {
            background: linear-gradient(135deg, #0a0a0a 0%, #111111 100%);
            border: 2px solid var(--ktm-input-border);
            color: #fff;
            border-radius: 8px;
            padding: 12px 15px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }
        
        .input-ktm:focus {
            background: linear-gradient(135deg, #0a0a0a 0%, #151515 100%);
            border-color: var(--ktm-orange);
            color: #fff;
            box-shadow: 
                inset 0 2px 10px rgba(0, 0, 0, 0.7),
                0 0 0 0.25rem rgba(255, 109, 31, 0.25),
                0 0 20px rgba(255, 109, 31, 0.1);
            transform: translateY(-1px);
        }
        
        .input-ktm::placeholder {
            color: #666;
            font-weight: 400;
        }
        
        /* Select personalizado */
        .select-ktm {
            background: linear-gradient(135deg, #0a0a0a 0%, #111111 100%);
            border: 2px solid var(--ktm-input-border);
            color: #fff;
            border-radius: 8px;
            padding: 12px 15px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.5);
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23FF6D1F' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 12px;
        }
        
        .select-ktm:focus {
            background: linear-gradient(135deg, #0a0a0a 0%, #151515 100%);
            border-color: var(--ktm-orange);
            color: #fff;
            box-shadow: 
                inset 0 2px 10px rgba(0, 0, 0, 0.7),
                0 0 0 0.25rem rgba(255, 109, 31, 0.25),
                0 0 20px rgba(255, 109, 31, 0.1);
            transform: translateY(-1px);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23ffffff' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        }
        
        /* User Avatar KTM */
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--ktm-orange) 0%, var(--ktm-orange-light) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            margin-right: 10px;
            box-shadow: 0 4px 8px rgba(255, 109, 31, 0.4);
            transition: all 0.3s ease;
        }
        
        .user-avatar:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(255, 109, 31, 0.5);
        }
        
        /* Badges KTM */
        .badge-documento {
            background: linear-gradient(135deg, var(--ktm-orange) 0%, var(--ktm-orange-light) 100%);
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.85rem;
            border: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .badge-active {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.85rem;
            box-shadow: 0 2px 5px rgba(40, 167, 69, 0.3);
        }
        
        /* Card Container KTM */
        .card-container {
            background: #000000; /* NEGRO PURO */
            border-radius: 12px;
            padding: 25px;
            border: 2px solid var(--ktm-orange);
            margin-top: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.8);
            position: relative;
            overflow: hidden;
        }
        
        .card-container:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--ktm-orange), var(--ktm-orange-light));
        }
        
        /* TÍTULO "TÉCNICOS ACTIVOS" */
        .titulo-tecnicos-activos {
            color: #ffffff !important;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.2rem;
        }
        
        .titulo-tecnicos-activos i {
            color: var(--ktm-orange);
            margin-right: 10px;
        }
        
        /* Search Box KTM */
        .search-box {
            background: linear-gradient(135deg, #0f0f0f 0%, #151515 100%);
            border: 2px solid var(--ktm-gray-border);
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
            transition: all 0.3s ease;
        }
        
        .search-box:focus-within {
            border-color: var(--ktm-orange);
            box-shadow: 0 6px 15px rgba(255, 109, 31, 0.3);
        }
        
        .search-box .form-control {
            background: transparent;
            border: none;
            color: #e0e0e0;
            box-shadow: none;
            padding: 8px 12px;
        }
        
        .search-box .input-group-text {
            background: transparent;
            border: none;
            color: var(--ktm-orange);
            padding: 8px 15px;
        }
        
        /* Empty State KTM */
        .empty-state {
            background: #000000;
            border: 2px dashed var(--ktm-orange);
            border-radius: 10px;
            padding: 60px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .empty-state:before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 109, 31, 0.05) 0%, transparent 70%);
        }
        
        .empty-state i {
            font-size: 4rem;
            color: var(--ktm-orange);
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        
        .empty-state h3 {
            color: #ffffff;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }
        
        .empty-state p {
            color: #aaa;
            position: relative;
            z-index: 1;
        }
        
        /* Botón de volver atrás */
        .btn-back-ktm {
            background: linear-gradient(135deg, #222 0%, #2a2a2a 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 6px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
        }
        
        .btn-back-ktm:hover {
            background: linear-gradient(135deg, #2a2a2a 0%, #333 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.5);
        }
        
        /* Paginación Bootstrap - hacerla oscura */
        .pagination {
            background: transparent !important;
        }
        
        .page-link {
            background-color: #111 !important;
            border-color: #2a2a2a !important;
            color: #aaa !important;
        }
        
        .page-link:hover {
            background-color: #222 !important;
            border-color: var(--ktm-orange) !important;
            color: var(--ktm-orange) !important;
        }
        
        .page-item.active .page-link {
            background-color: var(--ktm-orange) !important;
            border-color: var(--ktm-orange) !important;
            color: white !important;
        }
        
        /* Alertas oscuras */
        .alert {
            background: #000000 !important;
            border: 1px solid var(--ktm-orange) !important;
            color: #e0e0e0 !important;
            border-left: 4px solid var(--ktm-orange) !important;
        }
        
        .alert-success {
            border-left-color: #28a745 !important;
        }
        
        .alert-danger {
            border-left-color: #dc3545 !important;
        }
        
        .alert-info {
            border-left-color: #17a2b8 !important;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header-section .d-flex {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 15px;
            }
            
            .header-section .d-flex > div {
                width: 100%;
            }
            
            .header-section .d-flex .btn-group {
                width: 100%;
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
            
            .search-box {
                width: 100% !important;
            }
            
            .tabla-ktm {
                font-size: 0.85rem;
            }
            
            .tabla-ktm th, 
            .tabla-ktm td {
                padding: 12px 8px;
            }
            
            .acciones-container {
                display: flex;
                flex-direction: column;
                gap: 5px;
            }
            
            .btn-accion {
                width: 32px;
                height: 32px;
                font-size: 0.8rem;
            }
        }
        
        /* Scrollbar KTM */
        ::-webkit-scrollbar {
            width: 12px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--ktm-dark);
            border-radius: 6px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(var(--ktm-orange), var(--ktm-orange-light));
            border-radius: 6px;
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
            border: 2px solid var(--ktm-dark);
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(var(--ktm-orange-light), var(--ktm-orange));
        }
        
        /* Animaciones KTM */
        @keyframes fadeInRow {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .tabla-ktm tbody tr {
            animation: fadeInRow 0.5s ease-out forwards;
        }
        
        .tabla-ktm tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .tabla-ktm tbody tr:nth-child(2) { animation-delay: 0.2s; }
        .tabla-ktm tbody tr:nth-child(3) { animation-delay: 0.3s; }
        .tabla-ktm tbody tr:nth-child(4) { animation-delay: 0.4s; }
        .tabla-ktm tbody tr:nth-child(5) { animation-delay: 0.5s; }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="header-section">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="display-6">
                        <i class="fas fa-user-gear me-3" style="color: var(--ktm-orange);"></i>
                        Gestión de Técnicos 
                    </h1>
                    <p class="mb-0">Administra el personal técnico de tu equipo </p>
                </div>
                
                <div class="btn-group" role="group">
                    <a href="{{ route('panel') }}" class="btn btn-back-ktm">
                        <i class="fas fa-arrow-left me-2"></i> Volver al Panel
                    </a>
                    <button class="btn btn-ktm" data-bs-toggle="modal" data-bs-target="#AgregarModal">
                        <i class="fas fa-plus me-2"></i> Nuevo Técnico
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Estadísticas -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stats-value">{{ $datos->total() }}</div>
                    <div class="stats-label">Total Técnicos</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="stats-value">{{ $datos->count() }}</div>
                    <div class="stats-label">Técnicos Activos</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <div class="stats-value">{{ $datos->count() }}</div>
                    <div class="stats-label">Disponibles</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stats-value">-</div>
                    <div class="stats-label">Servicios/Mes</div>
                </div>
            </div>
        </div>
        
        <!-- Card Container para Técnicos Activos -->
        <div class="card-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <!-- TÍTULO "TÉCNICOS ACTIVOS" -->
                <h5 class="mb-0 titulo-tecnicos-activos">
                    <i class="fas fa-user-check me-2"></i>
                    Técnicos Activos
                </h5>
                
                <!-- Búsqueda -->
                <form action="{{ route('admin.tecnicos.index') }}" method="GET" class="d-flex align-items-center" style="gap: 10px;">
                    <div class="search-box" style="width: 300px;">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="form-control input-ktm" 
                                   name="search" id="searchInput" 
                                   placeholder="Buscar técnico..."
                                   value="{{ request('search') }}"
                                   style="border: none; border-radius: 0 8px 8px 0;">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-ktm">
                        <i class="fas fa-search me-2"></i> Buscar
                    </button>
                    <a href="{{ route('admin.tecnicos.index') }}" class="btn btn-ktm-outline">
                        <i class="fas fa-sync-alt me-2"></i> Restaurar
                    </a>
                </form>
            </div>
            
            <!-- Tabla de Técnicos - DISEÑO COMPLETAMENTE NEGRO -->
            @if($datos->count() > 0)
                <div class="table-responsive">
                    <table class="table tabla-ktm">
                        <thead>
                            <tr>
                                <th><i class="fas fa-id-card me-2"></i> ID</th>
                                <th><i class="fas fa-user me-2"></i> Técnico</th>
                                <th><i class="fas fa-address-card me-2"></i> Documento</th>
                                <th><i class="fas fa-envelope me-2"></i> Contacto</th>
                                <th><i class="fas fa-phone me-2"></i> Teléfono</th>
                                <th class="text-center"><i class="fas fa-cogs me-2"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $item)
                                <tr>
                                    <td>
                                        <span class="id-tecnico">{{ $item->ID_TECNICOS }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar">
                                                {{ substr($item->Nombre, 0, 2) }}
                                            </div>
                                            <div>
                                                <strong class="d-block">{{ $item->Nombre }}</strong>
                                                <small style="color: #aaa;">Técnico KTM</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge-documento">{{ $item->TipoDocumento }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-envelope me-2" style="color: #aaa;"></i>
                                            <span>{{ $item->Correo }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-phone me-2" style="color: #aaa;"></i>
                                            <span>{{ $item->Telefono }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="acciones-container">
                                            <button type="button" class="btn-accion btn-editar" 
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#EditarModal"
                                                    data-id="{{ $item->ID_TECNICOS }}"
                                                    data-nombre="{{ $item->Nombre }}"
                                                    data-tipo="{{ $item->TipoDocumento }}"
                                                    data-correo="{{ $item->Correo }}"
                                                    data-telefono="{{ $item->Telefono }}"
                                                    title="Editar">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>

                                            <button type="button" class="btn-accion btn-ver" 
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#HistorialModal"
                                                    data-id="{{ $item->ID_TECNICOS }}"
                                                    data-nombre="{{ $item->Nombre }}"
                                                    data-tipo="{{ $item->TipoDocumento }}"
                                                    data-correo="{{ $item->Correo }}"
                                                    data-telefono="{{ $item->Telefono }}"
                                                    title="Ver detalles">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>

                                            <form action="{{ route('admin.tecnicos.destroy', $item->ID_TECNICOS) }}" method="POST" onsubmit="return confirmarEliminar(event)" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-accion btn-eliminar" title="Eliminar">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Paginación -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $datos->links() }}
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-user-cog"></i>
                    <h3 class="mt-3">No hay técnicos registrados</h3>
                    <p class="text-muted">Comienza agregando tu primer técnico al sistema</p>
                    <button class="btn btn-ktm mt-3" data-bs-toggle="modal" data-bs-target="#AgregarModal">
                        <i class="fas fa-plus me-2"></i> Agregar Primer Técnico
                    </button>
                </div>
            @endif
        </div>
    </div>
    
    <!-- Modal Agregar Técnico -->
    <div class="modal fade modal-ktm" id="AgregarModal" tabindex="-1" aria-labelledby="AgregarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-user-plus me-2" style="color: var(--ktm-orange);"></i>
                        Crear Nuevo Técnico
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.tecnicos.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">ID Tecnico *</label>
                                <input type="text" class="form-control input-ktm" name="ID_TECNICOS" required>
                                <small style="color: #777;">ID único del técnico</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nombre Completo *</label>
                                <input type="text" class="form-control input-ktm" name="Nombre" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Correo Electrónico *</label>
                                <input type="email" class="form-control input-ktm" name="Correo" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Teléfono *</label>
                                <input type="text" class="form-control input-ktm" name="Telefono" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo de Documento *</label>
                            <select class="form-select select-ktm" name="TipoDocumento" required>
                                <option value="">[Seleccione]</option>
                                <option value="Cedula de Ciudadania">Cédula de Ciudadanía</option>
                                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                <option value="Pasaporte">Pasaporte</option>
                                <option value="Nit">NIT</option>
                                <option value="Rut">RUT</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-ktm-outline" data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i> Cancelar
                            </button>
                            <button type="submit" class="btn btn-ktm">
                                <i class="fas fa-save me-1"></i> Guardar Técnico
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Editar Técnico -->
    <div class="modal fade modal-ktm" id="EditarModal" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-pen-to-square me-2" style="color: #28a745;"></i>
                        Editar Técnico
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">ID Tecnico</label>
                                <input type="text" class="form-control input-ktm" id="editID_TECNICOS" name="ID_TECNICOS" required readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nombre Completo *</label>
                                <input type="text" class="form-control input-ktm" id="editNombre" name="Nombre" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Correo Electrónico *</label>
                                <input type="email" class="form-control input-ktm" id="editCorreo" name="Correo" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Teléfono *</label>
                                <input type="text" class="form-control input-ktm" id="editTelefono" name="Telefono" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo de Documento *</label>
                            <select class="form-select select-ktm" id="editTipoDocumento" name="TipoDocumento" required>
                                <option value="Cedula de Ciudadania">Cédula de Ciudadanía</option>
                                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                <option value="Pasaporte">Pasaporte</option>
                                <option value="Nit">NIT</option>
                                <option value="Rut">RUT</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-ktm-outline" data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i> Cancelar
                            </button>
                            <button type="submit" class="btn btn-ktm">
                                <i class="fas fa-save me-1"></i> Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Historial Técnico (Botón Ojo) -->
    <div class="modal fade modal-ktm" id="HistorialModal" tabindex="-1" aria-labelledby="HistorialModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-history me-2" style="color: #17a2b8;"></i>
                        Detalles del Técnico
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <div class="user-avatar mx-auto mb-3" style="width: 80px; height: 80px; font-size: 1.5rem;" id="historialAvatar">
                                JP
                            </div>
                            <h5 id="historialNombre" class="text-white">Cargando...</h5>
                            <div class="small" style="color: #777;" id="historialID">ID: </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="stats-card" style="padding: 15px;">
                                        <div class="stats-value text-center" id="serviciosTotales">-</div>
                                        <div class="stats-label text-center">Servicios Totales</div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="stats-card" style="padding: 15px;">
                                        <div class="stats-value text-center" id="serviciosMes">-</div>
                                        <div class="stats-label text-center">Este Mes</div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="stats-card" style="padding: 15px;">
                                        <div class="stats-value text-center" id="calificacion">-</div>
                                        <div class="stats-label text-center">Calificación</div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="stats-card" style="padding: 15px;">
                                        <div class="stats-value text-center" id="tiempoRespuesta">-</div>
                                        <div class="stats-label text-center">Tiempo Respuesta</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h6 class="mb-3 text-white">
                        <i class="fas fa-info-circle me-2"></i>
                        Información del Técnico
                    </h6>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">ID:</label>
                                <div class="input-ktm" id="modalID_TECNICOS">-</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nombre:</label>
                                <div class="input-ktm" id="modalNombre">-</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Correo:</label>
                                <div class="input-ktm" id="modalCorreo">-</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Teléfono:</label>
                                <div class="input-ktm" id="modalTelefono">-</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tipo Documento:</label>
                                <div class="input-ktm" id="modalTipoDocumento">-</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Estado:</label>
                                <div class="input-ktm">
                                    <span class="badge-active">Activo</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h6 class="mb-3 text-white mt-4">
                        <i class="fas fa-calendar-alt me-2"></i>
                        Actividad Reciente
                    </h6>
                    <div class="activity-timeline">
                        <div class="timeline-item">
                            <div class="timeline-date">Hoy</div>
                            <div class="timeline-content">
                                <strong>Técnico disponible</strong> para nuevos servicios
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">Última semana</div>
                            <div class="timeline-content">
                                <strong>5 servicios completados</strong> con satisfacción del cliente
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-ktm-outline" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Configurar modal de editar
            var editarModal = document.getElementById('EditarModal');
            
            editarModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                
                // Obtener datos del técnico
                var id = button.getAttribute('data-id');
                var nombre = button.getAttribute('data-nombre');
                var tipo = button.getAttribute('data-tipo');
                var correo = button.getAttribute('data-correo');
                var telefono = button.getAttribute('data-telefono');
                
                // Asignar valores a los campos del modal
                document.getElementById('editID_TECNICOS').value = id;
                document.getElementById('editNombre').value = nombre;
                document.getElementById('editCorreo').value = correo;
                document.getElementById('editTipoDocumento').value = tipo;
                document.getElementById('editTelefono').value = telefono;
                
                // Asignar ruta al formulario
                document.getElementById('editForm').action = '{{ url("admin/tecnicos") }}/' + id;
            });
            
            // Configurar modal de historial (botón ojo)
            var historialModal = document.getElementById('HistorialModal');
            
            historialModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                
                // Obtener datos del técnico
                var id = button.getAttribute('data-id');
                var nombre = button.getAttribute('data-nombre');
                var tipo = button.getAttribute('data-tipo');
                var correo = button.getAttribute('data-correo');
                var telefono = button.getAttribute('data-telefono');
                
                // Actualizar información del modal
                document.getElementById('historialNombre').textContent = nombre;
                document.getElementById('historialID').textContent = 'ID: ' + id;
                document.getElementById('historialAvatar').textContent = nombre.substring(0, 2).toUpperCase();
                
                // Actualizar información detallada
                document.getElementById('modalID_TECNICOS').textContent = id;
                document.getElementById('modalNombre').textContent = nombre;
                document.getElementById('modalCorreo').textContent = correo;
                document.getElementById('modalTelefono').textContent = telefono;
                document.getElementById('modalTipoDocumento').textContent = tipo;
                
                // Generar estadísticas aleatorias (simuladas)
                document.getElementById('serviciosTotales').textContent = Math.floor(Math.random() * 50) + 10;
                document.getElementById('serviciosMes').textContent = Math.floor(Math.random() * 10) + 1;
                document.getElementById('calificacion').textContent = (Math.random() * 2 + 3).toFixed(1) + '/5';
                document.getElementById('tiempoRespuesta').textContent = Math.floor(Math.random() * 120) + 30 + ' min';
            });
            
            // Confirmar eliminación
            window.confirmarEliminar = function(event) {
                event.preventDefault();
                
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede deshacer. El técnico será eliminado permanentemente.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#FF6D1F',
                    cancelButtonColor: '#333',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                    background: '#0a0a0a',
                    color: '#fff',
                    customClass: {
                        popup: 'modal-ktm',
                        title: 'text-orange'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.closest('form').submit();
                    }
                });
                
                return false;
            }
            
            // Efecto de búsqueda en tiempo real
            const searchInput = document.getElementById('searchInput');
            const tableRows = document.querySelectorAll('.tabla-ktm tbody tr');
            
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    
                    tableRows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        if (text.includes(searchTerm)) {
                            row.style.display = '';
                            row.style.animation = 'fadeInRow 0.5s ease-out forwards';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            }
            
            // Efecto hover mejorado en botones de acción
            const actionButtons = document.querySelectorAll('.btn-accion');
            actionButtons.forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px) scale(1.1)';
                });
                
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
            
            // Efecto de carga para las filas
            setTimeout(() => {
                document.querySelectorAll('.tabla-ktm tbody tr').forEach((row, index) => {
                    row.style.animationDelay = `${index * 0.1}s`;
                });
            }, 100);
            
            // Activity Timeline styles (para el modal)
            const style = document.createElement('style');
            style.textContent = `
                .activity-timeline {
                    position: relative;
                    padding-left: 30px;
                }
                
                .activity-timeline::before {
                    content: '';
                    position: absolute;
                    left: 0;
                    top: 0;
                    bottom: 0;
                    width: 2px;
                    background: linear-gradient(to bottom, var(--ktm-orange), var(--ktm-gray-border));
                }
                
                .timeline-item {
                    position: relative;
                    padding-bottom: 25px;
                    padding-left: 20px;
                }
                
                .timeline-item::before {
                    content: '';
                    position: absolute;
                    left: -30px;
                    top: 5px;
                    width: 12px;
                    height: 12px;
                    border-radius: 50%;
                    background: var(--ktm-orange);
                    border: 3px solid #0f0f0f;
                    box-shadow: 0 0 0 3px rgba(255, 109, 31, 0.2);
                }
                
                .timeline-date {
                    color: #aaa;
                    font-size: 0.85rem;
                    margin-bottom: 5px;
                }
                
                .timeline-content {
                    color: #e0e0e0;
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>
</html>