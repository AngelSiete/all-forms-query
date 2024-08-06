<?php
/*
Template Name: Forms-query-server
*/

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.dataTables.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
<div style="width:850px; margin:auto;">
<a href="https://oferta-certificacion.aenor.com/wp-admin/" style="display:flex;justify-content:center;">
							<img fetchpriority="high" width="192" height="auto" src="https://oferta-certificacion.aenor.com/wp-content/uploads/2023/12/AF-Logo-AENOR_POS_RGB-scaled.jpg" class="attachment-full size-full wp-image-10971" alt="" srcset="https://oferta-certificacion.aenor.com/wp-content/uploads/2023/12/AF-Logo-AENOR_POS_RGB-scaled.jpg 2560w, https://oferta-certificacion.aenor.com/wp-content/uploads/2023/12/AF-Logo-AENOR_POS_RGB-300x125.jpg 300w, https://oferta-certificacion.aenor.com/wp-content/uploads/2023/12/AF-Logo-AENOR_POS_RGB-1024x427.jpg 1024w, https://oferta-certificacion.aenor.com/wp-content/uploads/2023/12/AF-Logo-AENOR_POS_RGB-768x320.jpg 768w, https://oferta-certificacion.aenor.com/wp-content/uploads/2023/12/AF-Logo-AENOR_POS_RGB-1536x640.jpg 1536w, https://oferta-certificacion.aenor.com/wp-content/uploads/2023/12/AF-Logo-AENOR_POS_RGB-2048x853.jpg 2048w" sizes="(max-width: 2560px) 100vw, 2560px" >								</a>
    <header>
        <h1 style="color: #1F56A2; font-weight: 900; text-align: center;">
            Privado: Informe de todas las certificaciones (Server Side)
        </h1>
    </header>
    <table border="0" cellspacing="5" cellpadding="5" style="padding-left: 180px;padding-top: 15px;padding-bottom:30px;">
        <tbody><tr>
            <td>Fecha de inicio:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Fecha final:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody></table>
    <table id="tabla-resultados" data-page-length='50' class="display cell-border responsive hover stripe order-column dtr-inline collapsed" style="width:100%">
        <thead>
            <tr>
            <td data-dt-order="disable"></td>
            <td>Fecha de creación</td>
            <td data-dt-order="disable">Certificación</td>
            <td>Razón Social</td>
            <td data-dt-order="disable">Nombre y apellidos</td>
            <td data-dt-order="disable">Correo electrónico</td>
            <td data-dt-order="disable">¿Es cliente de AENOR?</td>
            </tr>
        </thead>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/2.0.1/sorting/datetime-moment.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.2/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.dataTables.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/2.0.1/i18n/es-ES.json"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.4/locale/es.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.dataTables.js"></script>
<script>
    let typesFormularios = [
        {
            "type": "test",
            "nombre": "test",
            "vista": "/view/test/"
        },
        {
            "type": "huella-de-carbono",
            "nombre": "Huella de Carbono",
            "vista": "/view/huella-de-carbono-informe-2/"
        },
        {
            "type": "trazabilidad-de-plastico",
            "nombre": "Trazabilidad de plástico y contenido en plástico reciclado",
            "vista": "/view/trazabilidad-de-plastico-y-contenido-en-plastico-reciclado-informe/"
        },
        {
            "type": "seguridad_salud_45001",
            "nombre": "Sistemas de Gestión de seguridad y salud en el trabajo ISO 45001 / PRL",
            "vista": "/view/formulario-iso-45001-informe/"
        },
        {
            "type": "seguridad_privada17483-1",
            "nombre": "UNE-EN 17483-1 Prestación de servicios de seguridad privada. Protección de infrastructuras críticas",
            "vista": "/view/formulario-une-en-17483-1-informe/"
        },
        {
            "type": "verificacion-de-proyectos-del-principio-dnsh",
            "nombre": "Verificación de proyectos segun cumplimiento del principio DNSH/",
            "vista": "/view/principio-dnsh-informe/"
        },
        {
            "type": "enplus",
            "nombre": "Certificación ENPLUS de pellets de madera para usos termicos",
            "vista": "/view/enplus-informe/"
        },
        {
            "type": "inspección",
            "nombre": "Inspección previa al embarque",
            "vista": "/view/inspeccion-informe/"
        },
        {
            "type": "productos_sanitarios-iso-13485",
            "nombre": "Sistemas de gestion de la calidad en productos sanitarios iso 13485",
            "vista": "/view/iso-13485-informe/"
        },
        {
            "type": "estrategia-de-compras",
            "nombre": "Estrategia de Compras sostenibles",
            "vista": "/view/estrategia-de-compras-sostenibles/"
        },
        {
            "type": "gestion-de-la-seguridad-de-la-informacion-iso-27001",
            "nombre": "Gestion de la seguridad de la informacion iso 27001",
            "vista": "/view/gestion-de-la-seguridad-de-la-informacion-iso-27001/"
        },
        {
            "type": "estrategia-de-compras",
            "nombre": "Estrategia de Compras sostenibles",
            "vista": "/view/estrategia-de-compras-sostenibles/"
        },
        {
            "type": "servicio-de-restauracion",
            "nombre": "Servicio de restauración",
            "vista": "/view/servicio-de-restauracion/"
        },
        {
            "type": "proyecto-idi",
            "nombre": "Certificación de proyectos de I+D+i",
            "vista": "/view/certificacion-de-proyectos-de-idi/"
        },
        {
            "type": "consumo_electrointensivas",
            "nombre": "Verificación de consumo para las empresas electrointensivas",
            "vista": "/view/verificacion-de-consumo-para-las-empresas-electrointensivas/"
        },
        {
            "type": "gestion-energetica50001",
            "nombre": "Certificación del sistema de gestión energética ISO 50001",
            "vista": "/view/certificacion-del-sistema-de-gestion-energetica-iso-50001/"
        },
        {
            "type": "continuidad-del-negocio-ISO22301",
            "nombre": "Continuidad del negocio: ISO 22301",
            "vista": "/view/continuidad-del-negocio-iso-22301/"
        },
        {
            "type": "ambiental-14001",
            "nombre": "Gestión ambiental: UNE-EN ISO 14001",
            "vista": "/view/gestion-ambiental-une-en-iso-14001/"
        },
        {
            "type": "OCS",
            "nombre": "OCS",
            "vista": "/view/ocs/"
        },
        {
            "type": "Leche-beta-caseínaA2",
            "nombre": "Leche beta caseína A2",
            "vista": "/view/leche-beta-caseina-a2/"
        },
        {
            "type": "BRC-CONSUMER-PRODUCTS",
            "nombre": "Protocolo BRC Consumer Products",
            "vista": "/view/protocolo-brc-comsumer-products/"
        },
        {
            "type": "BRC-Plant-Based",
            "nombre": "Protocolo BRC Plant Based",
            "vista": "/view/protocolo-brc-plant-based/"
        },
        {
            "type": "IFS-ESG-CHECK",
            "nombre": "Protocolo IFS ESG CHECK",
            "vista": "/view/protocolo-ifs-esg-check/"
        },
        {
            "type": "sitios-web-accesibles",
            "nombre": "Sitios web accesibles",
            "vista": "/view/sitios-web-accesibles/"
        },
        {
            "type": "bienestar-animal",
            "nombre": "Bienestar animal",
            "vista": "/view/bienestar-animal/"
        },
        {
            "type": "sostenibilidad-gri",
            "nombre": "Verificación de Memorias de Sostenibilidad GRI",
            "vista": "/view/verificacion-de-memorias-de-sostenibilidad-gri"
        },
        {
            "type": "info-no-financiera",
            "nombre": "Verificación de Información no financiera",
            "vista": "/view/verificacion-de-informacion-no-financiera/"
        },
        {
            "type": "esquema-fssc22000",
            "nombre": "Esquema FSSC 22000",
            "vista": "/view/esquema-fssc-22000/"
        },
        {
            "type": "gobierno-corporativo",
            "nombre": "Índice Buen Gobierno Corporativo",
            "vista": "/view/indice-buen-gobierno-corporativo/"
        },
        {
            "type": "marca-n-sotenible",
            "nombre": "Marca AENOR N Sostenible",
            "vista": "/view/marca-aenor-n-sostenible"
        },
        {
            "type": "antisoborno-iso37001",
            "nombre": "Sistema de Gestión Antisoborno ISO 37001",
            "vista": "/view/sistema-de-gestion-antisoborno-iso-37001/"
        },
        {
            "type": "gestion-compliance37301",
            "nombre": "Sistemas de gestión de Compliance ISO 37301",
            "vista": "/view/sistemas-de-gestion-de-compliance-iso-37301"
        },
        {
            "type": "protocolo-brc-packaging",
            "nombre": "Protocolo BRC PACKAGING",
            "vista": "/view/protocolo-brc-packaging/"
        },
        {
            "type": "sistemas-de-gestion-22000",
            "nombre": "Sistemas de Gestión ISO 22000",
            "vista": "/view/sistemas-de-gestion-iso-22000/"
        },
        {
            "type": "brc-agents-brokers",
            "nombre": "Protocolo BRC Agents Brokers",
            "vista": "/view/protocolo-brc-agents-and-brokers/"
        },
        {
            "type": "gestor-residuo-cero",
            "nombre": "Gestor residuo cero",
            "vista": "/view/gestor-residuo-cero/"
        },
        {
            "type": "18295-contacto-con-el-cliente",
            "nombre": "UNE-EN ISO 18295 Centro de contacto con el cliente",
            "vista": "/view/une-en-iso-18295-centro-de-contacto-con-el-cliente/"
        },
        {
            "type": "compromiso-de-mayores",
            "nombre": "Compromiso de mayores",
            "vista": "/view/compromiso-de-mayores/"
        },
        {
            "type": "estrategia-de-economia-circular",
            "nombre": "Estrategia de economía circular",
            "vista": "/view/estrategia-de-economia-circular/"
        },
        {
            "type": "teleconsulta",
            "nombre": "UNE 179011. Servicios Sanitarios. Teleconsulta",
            "vista": "/view/une-179011-servicios-sanitarios-teleconsulta/"
        },
        {
            "type": "iris",
            "nombre": "Sistemas de Gestión de la Calidad en el Sector Ferroviario: IRIS",
            "vista": "/view/sistemas-de-gestion-de-la-calidad-en-el-sector-ferroviario-iris"
        },
        {
            "type": "esquema-seguridad",
            "nombre": "Esquema nacional de seguridad (ENS)",
            "vista": "/view/esquema-nacional-de-seguridad-ens/"
        },
        {
            "type": "gestion-de-la-calidad:9001",
            "nombre": "Sistemas de gestión de la calidad:ISO 9001",
            "vista": "/view/sistemas-de-gestion-de-la-calidad-iso-9001/"
        },
        {
            "type": "marca-n-edificio-sostenible",
            "nombre": "Marca N Edificio Sostenible",
            "vista": "/view/marca-n-edificio-sostenible/"
        },
        {
            "type": "interovic",
            "nombre": "BAIE INTEROVIC Bienestar Animal ovino y caprino",
            "vista": "/view/baie-interovic-bienestar-animal-ovino-y-caprino/"
        },
        {
            "type": "haccp-restaurantes",
            "nombre": "HACCP RESTAURANTES",
            "vista": "/view/haccp-restaurantes/"
        },
        {
            "type": "al-rd-506-2013",
            "nombre": "Certificación de Fertilizantes conforme al RD 506/2013",
            "vista": "/view/certificacion-de-fertilizantes-conforme-al-rd-506-2013/"
        },
        {
            "type": "etg-jamon-serrano",
            "nombre": "Especialidad Tradicional Garantizada (ETG) Jamón Serrano",
            "vista": "/view/especialidad-tradicional-garantizada-etg-jamon-serrano/"
        },
        {
            "type": "aceite-de-oliva-virgen-extra",
            "nombre": "Marca AENOR Aceite de Oliva Virgen Extra",
            "vista": "/view/marca-aenor-aceite-de-oliva-virgen-extra/"
        },
        {
            "type": "ganaderias-de-vacuno-de-leche",
            "nombre": "Buenas Prácticas de Ganaderías de Vacuno de leche. Agrupaciones ganaderas",
            "vista": "/view/buenas-practicas-de-ganaderias-de-vacuno-de-leche-agrupaciones-ganaderas/"
        },
        {
            "type": "fertilizantes",
            "nombre": "Fertilizantes",
            "vista": "/view/fertilizantes/"
        },
        {
            "type": "protocolo-brc-start",
            "nombre": "Protocolo brc start",
            "vista": "/view/protocolo-brc-start"
        },
        {
            "type": "objetivos-de-desarrollo-sostenible",
            "nombre": "Objetivos de desarrollo sostenible",
            "vista": "/view/objetivos-de-desarrollo-sostenible/"
        },
        {
            "type": "prototipos-de-muestrarios",
            "nombre": "Certificación de prototipos de muestrarios",
            "vista": "/view/certificacion-de-prototipos-de-muestrarios/"
        },
        {
            "type": "Operadores-Carretillas-Manutención",
            "nombre": "Operadores de carretillas de manutención: UNE 58451",
            "vista": "/view/operadores-de-carretillas-de-manutencion-une-58451"
        },
        {
            "type": "GWO-Global-Wind-Organization",
            "nombre": "GWO-Global Wind Organization",
            "vista": "/view/gwo-global-wind-organization/"
        },
        {
            "type": "cadena-alimentos-alimentacion-humana-animal",
            "nombre": "Trazabilidad en la cadena de alimentos para alimentación humana y animal: UNE-EN ISO 22005",
            "vista": "/view/trazabilidad-en-la-cadena-de-alimentos-para-alimentacion-humana-y-animal-une-en-iso-22005/"
        },
        {
            "type": "globalgap-cadena-de-custodia",
            "nombre": "GLOBALG.A.P cadena de custodia (COC) frutas y hortalizas a través de auditoría combinada de IFS",
            "vista": "/view/globalg-a-p-cadena-de-custodia-coc-frutas-y-hortalizas-a-traves-de-auditoria-combinada-de-ifs/"
        },
        {
            "type": "globalg-a-p-albert-heijn",
            "nombre": "GLOBALG.A.P ALBERT HEIJN PROTOCOL",
            "vista": "/view/globalg-a-p-albert-heijn-protocol/"
        },
        {
            "type": "globalgap-evaluacion-riesgos-sociales",
            "nombre": "GLOBALG.A.P- evaluación de riesgos en las prácticas sociales (GLOBALG.A.P GRASP)",
            "vista": "/view/globalg-a-p-evaluacion-de-riesgos-en-las-practicas-sociales-globalg-a-p-grasp/"
        },
        {
            "type": "proteccion-identificacion-personal-cloud",
            "nombre": "Protección de Identificación Personal (PII) en Cloud: ISO/lEC 27018",
            "vista": "/view/proteccion-de-identificacion-personal-pii-en-cloud-iso-lec-27018/"
        },
        {
            "type": "certificacion-seguridad-vial-iso",
            "nombre": "Certificación de la seguridad vial ISO 39001",
            "vista": "/view/certificacion-de-la-seguridad-vial-iso-39001/"
        },
        {
            "type": "sistema-diligencia-eutr",
            "nombre": "Sistema de Diligencia Debida conforme a EUTR (Reglamento 995/2010)",
            "vista": "/view/sistema-de-diligencia-debida-conforme-a-eutr-reglamento-995-2010/"
        },
        {
            "type": "cadena-custodia-pefc",
            "nombre": "Cadena de Custodia de los Productos Forestales PEFC",
            "vista": "/view/cadena-de-custodia-de-los-productos-forestales-pefc/"
        },
        {
            "type": "gestion-forestal-pefc",
            "nombre": "Gestión Forestal PEFC",
            "vista": "/view/gestion-forestal-pefc/entry/"
        },
        {
            "type": "gestion-minera-sostenible-une",
            "nombre": "Gestión minera sostenible UNE 22480",
            "vista": "/view/gestion-minera-sostenible-une-22480/"
        },
        {
            "type": "gestion-del-servicio-de-teleasistencia-une-158401",
            "nombre": "Gestión del servicio de teleasistencia: UNE 158401",
            "vista": "/view/gestion-del-servicio-de-teleasistencia-une-158401/"
        },
        {
            "type": "gestion-de-centros-de-dia-y-de-noche-une-158201",
            "nombre": "Gestión de centros de día y de noche: UNE 158201",
            "vista": "/view/gestion-de-centros-de-dia-y-de-noche-une-158201/"
        },
        {
            "type": "gestion-de-accesibilidad-universal-une-170001",
            "nombre": "Gestión de accesibilidad universal UNE 170001",
            "vista": "/view/gestion-de-accesibilidad-universal-une-170001/"
        },
        {
            "type": "iso-20121-sostenibilidad-de-evento",
            "nombre": "ISO 20121 sostenibilidad de eventos",
            "vista": "/view/iso-20121-sostenibilidad-de-eventos/"
        },
        {
            "type": "servicios-de-seguridad-aeroportuaria-une-en-16082",
            "nombre": "Servicios de seguridad aeroportuaria: UNE-EN 16082",
            "vista": "/view/servicios-de-seguridad-aeroportuaria-une-en-16082/"
        },
        {
            "type": "espiga-barrada",
            "nombre": "Espiga barrada",
            "vista": "/view/espiga-barrada/"
        },
        {
            "type": "brc-st-dist",
            "nombre": "Protocolo BRC ST - Dist",
            "vista": "/view/protocolo-brc-st-dist/"
        },
        {
            "type": "brc-food",
            "nombre": "Protocolo BRC Food",
            "vista": "/view/protocolo-brc-food/"
        },
        {
            "type": "ifs-g-markets-hpc",
            "nombre": "Protocolo IFS G. Markets HPC",
            "vista": "/view/protocolo-ifs-g-markets-hpc/"
        },
        {
            "type": "ifs-hpc",
            "nombre": "Protocolo IFS HPC",
            "vista": "/view/protocolo-ifs-hpc/"
        },
        {
            "type": "ifs-pac-secure",
            "nombre": "Protocolo IFS pac secure",
            "vista": "/view/protocolo-ifs-pac-secure/"
        },
        {
            "type": "ifs-markets-logistics",
            "nombre": "Protocolo IFS G. Markets Logistics",
            "vista": "/view/protocolo-ifs-g-markets-logistics/"
        },
        {
            "type": "mascarillas-higienicas",
            "nombre": "Certificación mascarillas higiénicas",
            "vista": "/view/certificacion-mascarillas-higienicas/"
        },
        {
            "type": "digitalizacion-0060",
            "nombre": "Sistema de gestión para la digitalización: Especificación UNE 0060",
            "vista": "/view/sistema-de-gestion-para-la-digitalizacion-especificacion-une-0060/"
        },
        {
            "type": "aeroespacial",
            "nombre": "Sistemas de Gestión de la Calidad en el Sector Aeroespacial",
            "vista": "/view/sistemas-de-gestion-de-la-calidad-en-el-sector-aeroespacial/"
        },
        {
            "type": "psicosocial",
            "nombre": "ISO 45003- Gestión del riesgo psicosocial",
            "vista": "/view/iso-45003-gestion-del-riesgo-psicosocial"
        },
        {
            "type": "nutricion-dietetica-adultos",
            "nombre": "UNE179009 SG Calidad de Unidades de nutrición y dietética en adultos",
            "vista": "/view/une179009-sg-calidad-de-unidades-de-nutricion-y-dietetica-en-adultos/"
        },
        {
            "type": "0060-digitalizacion",
            "nombre": "Especificación UNE 0060- Sistema de gestión de la Digitalización",
            "vista": "/view/especificacion-une-0060-sistema-de-gestion-de-la-digitalizacion/"
        },
        {
            "type": "desperdicio-cero",
            "nombre": "Desperdicio alimentario Cero",
            "vista": "/view/desperdicio-alimentario-cero/"
        },
        {
            "type": "interporc-bienestar-animal",
            "nombre": "IAWS INTERPORC Bienestar Animal porcino blanco",
            "vista": "/view/iaws-interporc-bienestar-animal-porcino-blanco/"
        },
        {
            "type": "sae/993/2014",
            "nombre": "SAE: Sistemas de autocontrol específicos para la exportación Real Decreto 993/2014",
            "vista": "/view/sae-sistemas-de-autocontrol-especificos-para-la-exportacion-real-decreto-993-2014/"
        },
        {
            "type": "productos-ibericos-rd4-2014",
            "nombre": "Norma de Calidad de productos ibéricos (RD 4/2014)",
            "vista": "/view/norma-de-calidad-de-productos-ibericos-rd-4-2014/"
        },
        {
            "type": "cadena-forestales",
            "nombre": "Cadena de custodia de los productos forestales FSC ®",
            "vista": "/view/cadena-de-custodia-de-los-productos-forestales-fsc/"
        },
        {
            "type": "trazabilidad-ingles",
            "nombre": "Trazabilidad y contenido en reciclado – Inglés",
            "vista": "/view/trazabilidad-y-contenido-en-reciclado-ingles/"
        },
        {
            "type": "hortofruticola",
            "nombre": "TESCO NURTURE- Producción hortofrutícola",
            "vista": "/view/tesco-nurture-produccion-hortofruticola/"
        },
        {
            "type": "residuo-cero",
            "nombre": "Residuo cero",
            "vista": "/view/residuo-cero/"
        },
        {
            "type": "automocion-iatf",
            "nombre": "Sistemas de Gestión de la Calidad en el Sector Automoción: IATF (Incluye la norma ISO 9001)",
            "vista": "/view/sistemas-de-gestion-de-la-calidad-en-el-sector-automocion-iatf-incluye-la-norma-iso-9001/"
        },
        {
            "type": "pyme-innovadora",
            "nombre": "Pyme Innovadora EA 0047",
            "vista": "/view/pyme-innovadora-ea-0047/"
        },
        {
            "type": "innovadora-0043",
            "nombre": "Joven empresa innovadora EA 0043",
            "vista": "/view/joven-empresa-innovadora-ea-0043/"
        },
        {
            "type": "une-166006",
            "nombre": "Sistemas de Vigilancia e Inteligencia: UNE 166006",
            "vista": "/view/sistemas-de-vigilancia-e-inteligencia-une-166006/"
        },
        {
            "type": "une-166002",
            "nombre": "Sistemas de Gestión de I+D+i UNE 166002",
            "vista": "/view/sistemas-de-gestion-de-idi-une-166002/"
        },
        {
            "type": "certool",
            "nombre": "Certool",
            "vista": "/view/certool/"
        },
        {
            "type": "homologación -TELCO",
            "nombre": "Homologación TELCO",
            "vista": "/view/homologacion-telco/"
        },
        {
            "type": "cadena-de-frio",
            "nombre": "Cadena de frío",
            "vista": "/view/cadena-de-frio/"
        },
        {
            "type": "platanos-canarias",
            "nombre": "IGP Plátanos de Canarias",
            "vista": "/view/igp-platanos-de-canarias/"
        },
        {
            "type": "seguridad-28000",
            "nombre": "Gestión de la seguridad para la cadena de suministro ISO 28000",
            "vista": "/view/repeater-gestion-de-la-seguridad-para-la-cadena-de-suministro-iso-28000/"
        },
        {
            "type": "gei-perte-industrial",
            "nombre": "Verificación de emisiones GEI y validación del plan de reducción para el PERTE DESCARBONIZACIÓN INDUSTRIAL",
            "vista": "/view/verificacion-de-emisiones-gei-y-validacion-del-plan-de-reduccion-para-el-perte-descarbonizacion-industrial/"
        },
        {
            "type": "trazabilidad-desde-granja",
            "nombre": "Trazabilidad desde granja",
            "vista": "/view/trazabilidad-desde-granja/"
        },
        {
            "type": "atun-de-pesca",
            "nombre": "Atún de pesca responsable (APR)",
            "vista": "/view/atun-de-pesca-responsable-apr/"
        },
        {
            "type": "gestion-de-higiene-15593",
            "nombre": "Gestión de la higiene en la producción de los envases para productos alimenticios UNE-EN 15593",
            "vista": "/view/gestion-de-la-higiene-en-la-produccion-de-los-envases-para-productos-alimenticios-une-en-15593/"
        },
        {
            "type": "leche-de-pastoreo",
            "nombre": "Leche de Pastoreo",
            "vista": "/view/leche-de-pastoreo/"
        },
        {
            "type": "protocolo-globalgap",
            "nombre": "Protocolo GLOBALGAP- Frutas y hortalizas",
            "vista": "/view/protocolo-globalgap-frutas-y-hortalizas/"
        },
        {
            "type": "globalgap-vegetal",
            "nombre": "Protocolo GLOBALGAP- Material de Propagación Vegetal (PPM)",
            "vista": "/view/protocolo-globalgap-material-de-propagacion-vegetal-ppm/"
        },
        {
            "type": "produccion-libre-antibioticos",
            "nombre": "Producción libre antibióticos",
            "vista": "/view/produccion-libre-antibioticos/"
        },
        {
            "type": "psc-910-2014",
            "nombre": "Proveedores de servicios de confianza (PSC) Reglamento UE 910/2014 (EL DAS)",
            "vista": "/view/proveedores-de-servicios-de-confianza-psc-reglamento-ue-910-2014-el-das/"
        },
        {
            "type": "destruccion-segura-15713",
            "nombre": "Destrucción segura y confidencial de información: UNE 15713",
            "vista": "/view/destruccion-segura-y-confidencial-de-informacion-une-15713/"
        },
        {
            "type": "controles-de-seguridad-27017",
            "nombre": "Controles de seguridad para servicios en CLOUD: ISO/LEC 27017",
            "vista": "/view/controles-de-seguridad-para-servicios-en-cloud-iso-lec-27017/"
        },
        {
            "type": "marcado-ce",
            "nombre": "MARCADO CE",
            "vista": "/view/marcado-ce/"
        },
        {
            "type": "gestion-de-emergencias-22320",
            "nombre": "Gestión de emergencias: ISO 22320",
            "vista": "/view/gestion-de-emergencias-iso-22320/"
        },
        {
            "type": "ohsas-18001",
            "nombre": "Sistemas de gestión de seguridad y salud en el trabajo OHSAS 18001",
            "vista": "/view/sistemas-de-gestion-de-seguridad-y-salud-en-el-trabajo-ohsas-18001/"
        },
        {
            "type": "calidad-de-ambiente-interior",
            "nombre": "Calidad de ambiente interior",
            "vista": "/view/calidad-de-ambiente-interior/"
        },
        {
            "type": "cosmetica-natural",
            "nombre": "Cosmética Natural",
            "vista": "/view/cosmetica-natural/"
        },
        {
            "type": "emisiones-mdl-y-ac",
            "nombre": "Verificación de informes de emisiones y de toneladas-kilómetro 1 Protocolo de Kioto: MDL Y AC",
            "vista": "/view/verificacion-de-informes-de-emisiones-y-de-toneladas-kilometro-1-protocolo-de-kioto-mdl-y-ac/"
        },
        {
            "type": "gestion-forestal-fsc",
            "nombre": "Gestión Forestal FSC ®",
            "vista": "/view/gestion-forestal-fsc/"
        },
        {
            "type": "proveedores-energeticos-0055",
            "nombre": "Clasificación de Proveedores de Servicios Energéticos: EA 0055",
            "vista": "/view/clasificacion-de-proveedores-de-servicios-energeticos-ea-0055/"
        },
        {
            "type": "auditorias-energeticas",
            "nombre": "Verificación de auditorías energéticas por tercera parte: UNE-EN 16247-2",
            "vista": "/view/verificacion-de-auditorias-energeticas-por-tercera-parte-une-en-16247-2/"
        },
        {
            "type": "verificacion-residuos",
            "nombre": "Verificación según Legislación de Valorización de Residuos",
            "vista": "/view/verificacion-segun-legislacion-de-valorizacion-de-residuos/"
        },
        {
            "type": "sistema-evidencias-electronicas-une-71505-2-2013",
            "nombre": "Sistema de gestión de evidencias electrónicas: UNE 71505-2:2013",
            "vista": "/view/sistema-de-gestion-de-evidencias-electronicas-une-71505-22013/"
        },
        {
            "type": "sistema-gestión-riesgos-s-paciente-une-179003",
            "nombre": "Sistema de gestión de riesgos para la seguridad del paciente UNE 179003",
            "vista": "/view/une-179003/"
        },
        {
            "type": "certificacion-biomasud",
            "nombre": "Certificación biomasud de biocombustibles sólidos de uso doméstico",
            "vista": "/view/certificacion-biomasud/"
        },
        {
            "type": "gbpape",
            "nombre": "Guía de buenas prácticas ambientales de puertos del estado (GBPAPE)",
            "vista": "/view/guia-de-buenas-practicas-ambientales-de-puertos-del-estado-gbpape/"
        },
        {
            "type": "ecodiseno-une-en-iso-14006",
            "nombre": "ECODISEÑO: UNE-EN ISO 14006",
            "vista": "/view/ecodiseno-une-en-iso-14006/"
        },
        {
            "type": "gestion-etica-profesionalizada-eentros-especiales-empleo",
            "nombre": "Especificación para la gestión ética y profesionalizada de los centros especiales de empleo (CEE)",
            "vista": "/view/especificacion-para-la-gestion-etica-y-profesionalizada-de-los-centros-especiales-de-empleo-cee/"
        },
        {
            "type": "gestion-servicio-ayuda-domicilio-une-158301",
            "nombre": "Gestión del servicio de ayuda a domicilio: UNE 158301",
            "vista": "/view/gestion-del-servicio-de-ayuda-a-domicilio-une-158301/"
        },
        {
            "type": "gestion-residenciales-día-noche-integrado-une-158101",
            "nombre": "GESTIÓN DE LOS CENTROS RESIDENCIALES Y CENTROS RESIDENCIALES CON CENTRO DE DÍA O CENTRO DE NOCHE INTEGRADO: UNE 158101",
            "vista": "/view/gestion-de-los-centros-residenciales-y-centros-residenciales-con-centro-de-dia-o-centro-de-noche-integrado-une-158101/"
        },
        {
            "type": "reglamento-emas",
            "nombre": "Verificación según Reglamento EMAS",
            "vista": "/view/verificacion-segun-reglamento-emas/"
        },
        {
            "type": "productos-financieros-165001",
            "nombre": "Productos Financieros Socialmente Responsables: UNE 165001",
            "vista": "/view/productos-financieros-socialmente-responsables-une-165001/"
        },
        {
            "type": "entidad-familiarmente-responsable",
            "nombre": "Entidad Familiarmente Responsable (EFR)",
            "vista": "/view/entidad-familiarmente-responsable-efr/"
        },
        {
            "type": "qnet-sr10",
            "nombre": "Gestión de la Responsabilidad Social QNet SR10",
            "vista": "/view/gestion-de-la-responsabilidad-social-qnet-sr10/"
        },
        {
            "type": "prestacion-de-servicios-10667",
            "nombre": "Prestación de servicios de evaluación de personas: ISO 10667",
            "vista": "/view/prestacion-de-servicios-de-evaluacion-de-personas-iso-10667/"
        },
        {
            "type": "operadores-18878",
            "nombre": "Operadores de PEMP: UNE 589231ISO 18878",
            "vista": "/view/operadores-de-pemp-une-589231iso-18878/"
        },
        {
            "type": "referenciales-de-puertos-del-estado",
            "nombre": "Referenciales de Puertos del Estado",
            "vista": "/view/referenciales-de-puertos-del-estado/"
        },
        {
            "type": "servicios-funerarios-15017",
            "nombre": "Servicios Funerarios: UNE EN 15017",
            "vista": "/view/servicios-funerarios-une-en-15017/"
        },
        {
            "type": "investigacion-iso-26362",
            "nombre": "Investigación de Mercados,Social y de la Opinión: UNE ISO 20252/ ISO 26362 Access Panel",
            "vista": "/view/https-oferta-certificacion-aenor-com-investigacion-de-mercadossocial-y-de-la-opinion-une-iso-20252-iso-26362-access-panel/"
        },
        {
            "type": "servicios-de-traduccion-17100",
            "nombre": "Servicios de Traducción: ISO 17100",
            "vista": "/view/servicios-de-traduccion-iso-17100/"
        },
        {
            "type": "practicas-comercio-electronico",
            "nombre": "Buenas Prácticas de Comercio Electrónico",
            "vista": "/view/buenas-practicas-de-comercio-electronico/"
        },
        {
            "type": "transporte-publico-13816",
            "nombre": "Transporte Público de pasajeros: UNE-EN 13816",
            "vista": "/view/transporte-publico-de-pasajeros-une-en-13816/"
        },
        {
            "type": "aire-libre-en-16630",
            "nombre": "Instalación y mantenimiento de áreas de entrenamiento físico al aire libre: UNE-EN 16630",
            "vista": "/view/instalacion-y-mantenimiento-de-areas-de-entrenamiento-fisico-al-aire-libre-une-en-16630/"
        },
        {
            "type": "cartas-de-servicios-93200",
            "nombre": "Cartas de Servicios: UNE 93200",
            "vista": "/view/cartas-de-servicios-une-93200/"
        },
        {
            "type": "calidad-turistica",
            "nombre": "Calidad Turística (Q)",
            "vista": "/view/calidad-turistica-q/"
        },
        {
            "type": "calidad-comercial-175001",
            "nombre": "Calidad Comercial: UNE 175001",
            "vista": "/view/calidad-comercial-une-175001/"
        },
        {
            "type": "centros-cliente-15838",
            "nombre": "Centros de contacto con el cliente: UNE-EN 15838",
            "vista": "/view/centros-de-contacto-con-el-cliente-une-en-15838/"
        },
        {
            "type": "calidad-dentales-179001",
            "nombre": "Calidad en los Centros y Servicios Dentales: UNE 179001",
            "vista": "/view/calidad-en-los-centros-y-servicios-dentales-une-179001/"
        },
        {
            "type": "calidad-en-escuelas-infantiles-172402-2011",
            "nombre": "Calidad de Servicio en Escuelas Infantiles: UNE 172402:2011",
            "vista": "/view/calidad-de-servicio-en-escuelas-infantiles-une-1724022011/"
        },
        {
            "type": "calidad-de-productos",
            "nombre": "Calidad de Productos: construcción (estructurales y de edificación), eléctricos, alimentarios, servicios",
            "vista": "/view/calidad-de-productos-construccion-estructurales-y-de-edificacion-electricos-alimentarios-servicios/"
        },
        {
            "type": "calidad-formacion-virtual - 66181",
            "nombre": "Calidad en la formación virtual: UNE 66181",
            "vista": "/view/calidad-en-la-formacion-virtual-une-66181/"
        },
        {
            "type": "gestion-patrimonio-personal",
            "nombre": "Asesoramiento en Gestión del Patrimonio personal basado en UNE-ISO 22222",
            "vista": "/view/asesoramiento-en-gestion-del-patrimonio-personal-basado-en-une-iso-22222/"
        },
        {
            "type": "gestion-documentos",
            "nombre": "Sistema de Gestión de los documentos",
            "vista": "/view/sistema-de-gestion-de-los-documentos/"
        },
        {
            "type": "evaluacion-efqm",
            "nombre": "Evaluación EFQM",
            "vista": "/view/evaluacion-efqm/"
        },
        {
            "type": "modelo-sortware-33000-spice",
            "nombre": "Modelo de Madurez de la Ingeniería del Software ISO/lEC 33000-SPICE",
            "vista": "/view/modelo-de-madurez-de-la-ingenieria-del-software-iso-lec-33000-spice/"
        },
        {
            "type": "inspeccion-calidad-atmosferas-interiores-171330",
            "nombre": "Inspección de Calidad de Atmósferas Interiores: UNE 171330",
            "vista": "/view/inspeccion-de-calidad-de-atmosferas-interiores-une-171330/"
        },
        {
            "type": "fabricacion-productos-cosmeticos-22716",
            "nombre": "Buenas Prácticas de Fabricación en Productos Cosméticos: UNE EN ISO 22716",
            "vista": "/view/buenas-practicas-de-fabricacion-en-productos-cosmeticos-une-en-iso-22716/"
        },
        {
            "type": "verificacion-huellas-de-carbono",
            "nombre": "Verificación de huellas de carbono/inventarios de emisiones de Gases de Efecto Invernadero",
            "vista": "/view/verificacion-de-huellas-de-carbono-inventarios-de-emisiones-de-gases-de-efecto-invernadero/"
        },
        {
            "type": "centros-tecnicos-de-tacografos",
            "nombre": "Sistemas de Gestión de la Calidad en Centros Técnicos de Tacógrafos",
            "vista": "/view/sistemas-de-gestion-de-la-calidad-en-centros-tecnicos-de-tacografos/"
        },
        {
            "type": "sistemas-de-gestion-transporte-sanitario",
            "nombre": "Sistemas de Gestión de la Calidad para Empresas de Transporte Sanitario: UNE 179002",
            "vista": "/view/sistemas-de-gestion-de-la-calidad-para-empresas-de-transporte-sanitario-une-179002/"
        },
        {
            "type": "certificacion-pecal",
            "nombre": "Sistemas de Gestión para el Sector Defensa: Certificación PECAL",
            "vista": "/view/sistemas-de-gestion-para-el-sector-defensa-certificacion-pecal/"
        },
        {
            "type": "gestion-metrologica-10012",
            "nombre": "Gestión Metrológica: ISO 10012",
            "vista": "/view/gestion-metrologica-iso-10012/"
        },
        {
            "type": "protocolo-markets-food",
            "nombre": "Protocolo IFS G. Markets Food",
            "vista": "/view/protocolo-ifs-g-markets-food/"
        },
        {
            "type": "protocolo-ifs-broker",
            "nombre": "Protocolo IFS Broker",
            "vista": "/view/protocolo-ifs-broker/"
        },
        {
            "type": "protocolo-ifs-logistic",
            "nombre": "Protocolo IFS Logistic",
            "vista": "/view/protocolo-ifs-logistic/"
        },
        {
            "type": "protocolo-ifs-food",
            "nombre": "PROTOCOLO IFS FOOD",
            "vista": "/view/protocolo-ifs-food/"
        },
        {
            "type": "privacidad-informacion-27701",
            "nombre": "Privacidad de la Información: ISO/lEC 27701",
            "vista": "/view/privacidad-de-la-informacion-iso-lec-27701/"
        },
        {
            "type": "control-produccion-hormigon-163-2019",
            "nombre": "Control producción hormigón RD 163/2019",
            "vista": "/view/control-produccion-hormigon-rd-163-2019/"
        },
        {
            "type": "directrices-generales-covid-19",
            "nombre": "Directrices generales para un trabajo seguro durante la pandemia de COVID-19: UNE-ISO/PAS 45005",
            "vista": "/view/directrices-generales-para-un-trabajo-seguro-durante-la-pandemia-de-covid-19-une-iso-pas-45005/"
        },
        {
            "type": "protocolos-frente-al-covid-19",
            "nombre": "Protocolos frente al COVID-19",
            "vista": "/view/protocolos-frente-al-covid-19/"
        },
        {
            "type": "gestion-de-riesgos-31000",
            "nombre": "Gestión de Riesgos: ISO 31000",
            "vista": "/view/gestion-de-riesgos-iso-31000/"
        },
        {
            "type": "certificacion-organizacion-saludable",
            "nombre": "Certificación Organización Saludable",
            "vista": "/view/certificacion-organizacion-saludable/"
        },
        {
            "type": "project-trust",
            "nombre": "Project Trust: Fondos europeos Next Generation",
            "vista": "/view/project-trust-fondos-europeos-next-generation/"
        },
        {
            "type": "calidad-en-servicios-20000",
            "nombre": "Calidad en Servicios TI ISO/lEC 20000",
            "vista": "/view/calidad-en-servicios-ti-iso-lec-20000/"
        },
        {
            "type": "sistema-de-gestion-de-compliance-penal",
            "nombre": "Sistema de Gestión de Compliance Penal - UNE 19601",
            "vista": "/view/sistema-de-gestion-de-compliance-penal-une-19601/"
        },
        {
            "type": "sistema-de-gestion-compliance-tributario-19602",
            "nombre": "Sistema de Gestión Compliance Tributario - UNE 19602",
            "vista": "/view/sistema-de-gestion-compliance-tributario-une-19602/"
        },
        {
            "type": "sistemas-de-genero-igualdad-retributiva",
            "nombre": "Sistemas de Igualdad de Género y de Igualdad Retributiva",
            "vista": "/view/sistemas-de-igualdad-de-genero-y-de-igualdad-retributiva/"
        },
        {
            "type": "ods-estrategia",
            "nombre": "ODS Estrategia",
            "vista": "/view/ods-estrategia/"
        },
        {
            "type": "verificacion-de-protocolos-frente-covid-19",
            "nombre": "Verificación de protocolos frente al COVID-19 en eventos",
            "vista": "/view/verificacion-de-protocolos-frente-al-covid-19-en-eventos/"
        },
        {
            "type": "iso-31030-gestion-de-riesgos-en-viajes",
            "nombre": "ISO 31030 Gestión de riesgos en viajes",
            "vista": "/view/iso-31030-gestion-de-riesgos-en-viajes/"
        },
        {
            "type": "auditoria-retributiva",
            "nombre": "Auditoria retributiva",
            "vista": "/view/auditoria-retributiva/"
        },
        {
            "type": "auditoria-retributiva-condiciones",
            "nombre": "Auditoria retributiva",
            "vista": "/view/auditoria-retributiva/"
        },
        {
            "type": "interovic",
            "nombre": "BAIE INTEROVIC Bienestar Animal ovino y caprino",
            "vista": "/view/baie-interovic-bienestar-animal-ovino-y-caprino/"
        },
        {
            "type": "haccp-restaurantes",
            "nombre": "HACCP RESTAURANTES",
            "vista": "/view/haccp-restaurantes/"
        },
        {
            "type": "al-rd-506-2013",
            "nombre": "Certificación de Fertilizantes conforme al RD 506/2013",
            "vista": "/view/certificacion-de-fertilizantes-conforme-al-rd-506-2013/"
        },
        {
            "type": "etg-jamon-serrano",
            "nombre": "Especialidad Tradicional Garantizada (ETG) Jamón Serrano",
            "vista": "/view/especialidad-tradicional-garantizada-etg-jamon-serrano/"
        },
        {
            "type": "aceite-de-oliva-virgen-extra",
            "nombre": "Marca AENOR Aceite de Oliva Virgen Extra",
            "vista": "/view/marca-aenor-aceite-de-oliva-virgen-extra/"
        },
        {
            "type": "ganaderias-de-vacuno-de-leche",
            "nombre": "Buenas Prácticas de Ganaderías de Vacuno de leche. Agrupaciones ganaderas",
            "vista": "/view/buenas-practicas-de-ganaderias-de-vacuno-de-leche-agrupaciones-ganaderas/"
        },
        {
            "type": "27001-italiano",
            "nombre": "ISO 27001 Gestione della sicurezza delle informazioni",
            "vista": "/view/iso-27001-gestione-della-sicurezza-delle-informazioni/"
        },
        {
            "type": "valorizzazione-dei-rifiuti",
            "nombre": "Valorizzazione dei rifiuti",
            "vista": "/view/valorizzazione-dei-rifiuti-2/"
        },
        {
            "type": "ISO13485",
            "nombre": "Sistemi di gestione della qualità per i dispositivi medici: ISO13485",
            "vista": "/view/ISO13485/entry/"
        },
        {
            "type": "enplus",
            "nombre": "Enplus ® Pellet di legno per usi termici",
            "vista": "/view/enplus-pellet-di-legno-per-usi-termici/"
        },
        {
            "type": "esquema-nacional-ens",
            "nombre": "Sistema nazionale di sicurezza-NSA",
            "vista": "/view/sistema-nazionale-di-sicurezza-nsa/"
        },
        {
            "type": "sistema-de-gestione-anticorruzione-37001",
            "nombre": "Sistema di gestione anticorruzione – ISO 37001",
            "vista": "/view/sistema-di-gestione-anticorruzione-iso-37001/"
        },
        {
            "type": "iso-20121",
            "nombre": "ISO 20121 Sostenibilità degli eventi",
            "vista": "/view/iso-20121-sostenibilita-degli-eventi"
        },
        {
            "type": "iso-14001",
            "nombre": "ISO 14001",
            "vista": "/view/iso-14001/"
        },
        {
            "type": "sicurezza-stradale",
            "nombre": "Sicurezza stradale",
            "vista": "/view/sicurezza-stradale/"
        },
        {
            "type": "impronta-di-carbonio",
            "nombre": "Impronta di carbonio",
            "vista": "/view/impronta-di-carbonio/"
        },
        {
            "type": "iso-27017",
            "nombre": "Controlli di sicurezza in cloud. ISO 27017",
            "vista": "/view/controlli-di-sicurezza-in-cloud-iso-27017/"
        },
        {
            "type": "iso-45001",
            "nombre": "ISO 45001",
            "vista": "/view/iso-45001/"
        },
        {
            "type": "tracciabilita-alimentare",
            "nombre": "Tracciabilità alimentare",
            "vista": "/view/tracciabilita-alimentare/"
        },
        {
            "type": "emas",
            "nombre": "EMAS",
            "vista": "/view/emas/"
        },
        {
            "type": "benessere-aziendale",
            "nombre": "Benessere aziendale",
            "vista": "/view/benessere-aziendale/"
        },
        {
            "type": "iso-50001",
            "nombre": "Gestione energetica – ISO 50001",
            "vista": "/view/gestione-energetica-iso-50001/"
        },
        {
            "type": "iso-9001",
            "nombre": "ISO 9001",
            "vista": "/view/iso-9001/"
        },
        {
            "type": "rifiuti-zero",
            "nombre": "Rifiuti zero",
            "vista": "/view/rifiuti-zero/"
        },
        {
            "type": "iso-27018",
            "nombre": "Applicazione di controlli SI specifici di privacy in cloud ISO 27018",
            "vista": "applicazione-di-controlli-si-specifici-di-privacy-in-cloud-iso-27018/"
        },
        {
            "type": "ifs-food",
            "nombre": "IFS FOOD",
            "vista": "/view/ifs-food/"
        },
        {
            "type": "sicurezza-alimentare",
            "nombre": "Sicurezza stradale",
            "vista": "/view/sicurezza-stradale/"
        },
        {
            "type": "iso-27001-portugues",
            "nombre": "Sistema de segurança da informação ISO 27001",
            "vista": "/view/sistema-da-seguranca-da-informacao-iso-27001/"
        },
        {
            "type": "13485portugues",
            "nombre": "Sistemas de gestão da qualidade em produtos sanitários:ISO 13485",
            "vista": "/view/sistemas-de-gestao-da-qualidade-em-produtos-santitarios-iso-13485/"
        },
        {
            "type": "sistema-de-gestao-4452",
            "nombre": "Sistema de Gestão de Conciliação entre Vida Profissional e familiar NP 4452",
            "vista": "/view/sistema-de-gestao-de-conciliacao-entre-vida-profissional-e-familiar-np-4452/"
        },
        {
            "type": "pessoas-np4427",
            "nombre": "Sistema de Gestão das Pessoas NP4427",
            "vista": "/view/sistema-de-gestao-das-pessoas-np4427/"
        },
        {
            "type": "certificacao-respostas-sociais",
            "nombre": "Certificação respostas sociais",
            "vista": "/view/certificacao-respostas-sociais/"
        },
        {
            "type": "sistemas-de-gestao-de-idi-une-166002",
            "nombre": "Sistemas de gestão de IDI / UNE 166002",
            "vista": "/view/sistemas-de-gestao-de-idi-une-166002/"
        },
        {
            "type": "gestao-forestal-fsc",
            "nombre": "Gestão forestal FSC ®",
            "vista": "/view/gestao-forestal-fsc/"
        },
        {
            "type": "boas-praticas-une-en-iso-22716",
            "nombre": "Boas práticas de fabricação em produtos cosméticos: UNE EN ISO 22716",
            "vista": "/view/boas-praticas-de-fabricacao-em-produtos-cosmeticos-une-en-iso-22716/"
        },
        {
            "type": "gestion-de-emergencias-iso-22320",
            "nombre": "Gestión de emergencias: ISO 22320",
            "vista": "/view/gestion-de-emergencias-iso-22320-2/"
        },
        {
            "type": "gestao-forestal-pefc",
            "nombre": "Gestão forestal PEFC",
            "vista": "/view/gestao-forestal-pefc/"
        },
        {
            "type": "sistema-de-gestao-da-responsabilidade-social-iqnet-sr10",
            "nombre": "Sistema de gestão da responsabilidade social / IQNET / SR10",
            "vista": "/view/sistema-de-gestao-da-responsabilidade-social-iqnet-sr10/"
        },
        {
            "type": "bem-estar-animal",
            "nombre": "Bem-estar animal",
            "vista": "/view/bem-estar-animal/"
        },
        {
            "type": "saude-no-trabalho-iso-45001-prl",
            "nombre": "Sistemas de gestião de segurança e saúde no trabalho ISO 45001 / PRL",
            "vista": "/view/sistemas-de-gestiao-de-seguranca-e-saude-no-trabalho-iso-45001-prl/"
        },
        {
            "type": "emissoes-de-gases-de-efeito-estufa",
            "nombre": "Verificação de pegada de carbono/inventários de emissões de gases de efeito estufa",
            "vista": "/view/verificacao-de-pegada-de-carbono-inventarios-de-emissoes-de-gases-de-efeito-estufa/"
        },
        {
            "type": "iso-14001",
            "nombre": "Sistema de gestão ambiental: ISO 14001",
            "vista": "/view/sistema-de-gestao-ambiental-iso-14001/"
        },
        {
            "type": "iso-37001",
            "nombre": "Sistema de gestão antisoborno- ISO 37001",
            "vista": "/view/sistema-de-gestao-antisoborno-iso-37001/"
        },
        {
            "type": "igualdade-de-genero-e-de-igualdade-retributiva",
            "nombre": "Sistemas de igualdade de género e de igualdade retributiva",
            "vista": "/view/sistemas-de-igualdade-de-genero-e-de-igualdade-retributiva/"
        },
        {
            "type": "qualidade-iso-9001",
            "nombre": "Sistemas de gestão da qualidade: ISO 9001",
            "vista": "/view/sistemas-de-gestao-da-qualidade-iso-9001/"
        },
        {
            "type": "protocolo-ifs-y-brc-food",
            "nombre": "Protocolo IFS y BRC FOOD",
            "vista": "/view/protocolo-ifs-y-brc-food//"
        },
        {
            "type": "contra-la-violencia-a-las-mujeres",
            "nombre": "Certificación de Protocolo contra la Violencia a las Mujeres",
            "vista": "/view/certificacion-de-protocolo-contra-la-violencia-a-las-mujeres/"
        },
        {
            "type": "personal-invrestigador",
            "nombre": "Certificación de Personal Investigador (bonificaciones Seguridad Social)",
            "vista": "/view/certificacion-de-personal-investigador-bonificaciones-seguridad-social/"
        },
        {
            "type": "test-campo-provincias",
            "nombre": "PRUEBA PARA JS PROVINCIAS ESPAÑA",
            "vista": "/view/prueba-js-campos-provincias/"
        },
        {
            "type": "asignacion-gratuita-de-emision",
            "nombre": "Verificación de la solicitud de asignación gratuita de derechos de emisión para el periodo 2026-2030",
            "vista": "/view/verificacion-de-la-solicitud-de-asignacion-gratuita-de-derechos-de-emision-para-el-periodo-2026-2030/"
        },
        {
            "type": "certificacion-de-ahorro-energeticos-singulares",
            "nombre": "Certificados de ahorro energéticos (CAE`S) - actuaciones para proyectos singulares",
            "vista": "/view/certificados-de-ahorro-energeticos-caes-actuaciones-para-proyectos-singulares/"
        },
        {
            "type": "certificados-de-ahorro-actuaciones-estandarizadas",
            "nombre": "Certificados de Ahorro Energéticos (CAE`s)- Actuaciones estandarizadas",
            "vista": "/view/certificados-de-ahorro-energeticos-caes-actuaciones-estandarizadas/"
        },
        {
            "type": "rehabilitacion-sostenible",
            "nombre": "Rehabilitación sostenible ",
            "vista": "/view/rehabilitacion-sostenible/"
        },
        {
            "type": "reforma-sostenible",
            "nombre": "Reforma sostenible",
            "vista": "/view/reforma-sostenible/"
        },
        {
            "type": "certificacion-de-agricultura-regenerativa-epigen-y-la-certificacion-epigen-healthy-bite",
            "nombre": "Certificación de agricultura regenerativa Epigen y la certificación Epigen Healthy Bite®",
            "vista": "/view/certificacion-de-agricultura-regenerativa-epigen-y-la-certificacion-epigen-healthy-bite/"
        },
        {
            "type": "huella-hidrica",
            "nombre": "Huella hídrica",
            "vista": "/view/huella-hidrica/"
        },
        {
            "type": "huella-de-carbono-de-producto",
            "nombre": "Huella de carbono de producto",
            "vista": "/view/huella-de-carbono-de-producto/"
        },
        {
            "type": "huellla-de-carbono-organizacion",
            "nombre": "Huella de carbono de organización",
            "vista": "/view/huella-de-carbono-de-organizacion/"
        }
    ];

    let minDate, maxDate;
// Custom filtering function which will search data in column four between two values
// DataTable.ext.search.push(function (settings, data, dataIndex) {
//     let min = minDate.val();
//     let max = maxDate.val();
//     let dateParts = data[1].split("-");
//     let date = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]);
//     if (
//         (min === null && max === null) ||
//         (min === null && date <= max) ||
//         (min <= date && max === null) ||
//         (min <= date && date <= max)
//     ) {
//         return true;
//     }
//     return false;
// });
 
// Create date inputs
// minDate = new DateTime('#min', {
//     format: 'DD-MM-YYYY',
//     i18n: {
//             months: {
//                 "0": "Enero",
//                 "1": "Febrero",
//                 "10": "Noviembre",
//                 "11": "Diciembre",
//                 "2": "Marzo",
//                 "3": "Abril",
//                 "4": "Mayo",
//                 "5": "Junio",
//                 "6": "Julio",
//                 "7": "Agosto",
//                 "8": "Septiembre",
//                 "9": "Octubre"
//             },
//             weekdays: {
//             "0": "Dom",
//             "1": "Lun",
//             "2": "Mar",
//             "4": "Jue",
//             "5": "Vie",
//             "3": "Mié",
//             "6": "Sáb"
//         },
//         }
// });
// maxDate = new DateTime('#max', {
//     format: 'DD-MM-YYYY',
//     i18n: {
//             months: {
//                 "0": "Enero",
//                 "1": "Febrero",
//                 "10": "Noviembre",
//                 "11": "Diciembre",
//                 "2": "Marzo",
//                 "3": "Abril",
//                 "4": "Mayo",
//                 "5": "Junio",
//                 "6": "Julio",
//                 "7": "Agosto",
//                 "8": "Septiembre",
//                 "9": "Octubre"
//             },
//             weekdays: {
//             "0": "Dom",
//             "1": "Lun",
//             "2": "Mar",
//             "4": "Jue",
//             "5": "Vie",
//             "3": "Mié",
//             "6": "Sáb"
//         },
//         }
// });
// console.log(minDate.s, maxDate.s);
// DataTables initialisation
let idFormulario;
let table = new DataTable('#tabla-resultados', {
    serverSide: true,
    processing: true,
    ajax: {
        url: '/fetchdata',
        type: 'POST',
        beforeSend: function () {
            document.getElementById('tabla-resultados').style.background = '#205f93';
            document.getElementById('tabla-resultados').style.opacity = '0.3';
        },
        complete: function () {
            document.getElementById('tabla-resultados').style.background = 'unset';
            document.getElementById('tabla-resultados').style.opacity = 'unset';
        }
    //     data:function(dtParms){
    //         dtParms.minDate = minDate;
    //         dtParms.maxDate = maxDate;
    //         return dtParms
    // }
    },
    drawCallback: function (settings) {
        const arraycolumnas = document.getElementsByClassName('clienteaenor');
        const clienteArray = Array.from(arraycolumnas);
        for (element of clienteArray){
            if (element.innerHTML === 'Sí'){
                element.parentElement.classList.add('cliente-aenor');
            }
        }
    },
    locale: 'es',
    paging: true,
    language: {
        url: '//cdn.datatables.net/plug-ins/2.0.1/i18n/es-ES.json',
        processing: '<b>Cargando resultados...</b> ',
    },
    order: [[1, 'desc']],
    columnDefs: [
        {
            className: 'dtr-control',
            orderable: false,
            targets: 0,
            defaultContent: '',
            render:function(data){
                idFormulario = data;
            }
        },
        {
            targets: 2,
            render: function (data) {
                let found = typesFormularios.find((element) => element.type === data)
                if (found){
                    const nombre = found.nombre;
                    const enlace = found.vista;
                    return `<a href=${enlace}entry/${idFormulario} style="color: blue; text-decoration: none;" >${nombre}</a>` 
                }
                else{
                    return `<p>${data}</p>` 
                }
            },
        },
        {
            targets: [5,23],
            render: function (data) {
                if (data != null){
                    return `<a href="mailto:${data}">${data}</a>`;
                }else{
                    return '';
                }
            },
        },
        {
            targets: 6,
            className: 'clienteaenor',
        },
        {
            targets: [7,17,24,25,28,29],
            data: null,
            defaultContent:''
        },
        {
            targets: 35,
            data: null,
            defaultContent: 'El Grupo AENOR, en adelante AENOR, cuya matriz es AENOR INTERNACIONAL, S.A.U., con domicilio en C. Génova 6, Madrid 28004, tratará como Responsable sus datos personales para gestionar la información solicitada, así como, en el caso de ser autorizado, el envío de información sobre actividades, productos y servicios relacionados con AENOR que puedan ser de su interés. La base que legitima el tratamiento de sus datos es el consentimiento que nos presta al marcar la correspondiente autorización. Podrá ejercitar los derechos de acceso, rectificación, supresión, portabilidad, oposición y limitación al tratamiento de sus datos, así como el derecho a retirar el consentimiento otorgado, dirigiéndose a AENOR en la dirección anteriormente indicada o escribiendo al correo <a href="mailto:datos@aenor.com">datos@aenor.com</a>',
        },
        {
            targets: [36,37],
            render: function (data) {
                if (data != null){
                    return data;
                }else{
                    return '<span>\u{274C}</span>';
                }
            },
        },
        {
            targets: 38,
            render: function (data) {
                return `<form method="post" action="">
                        <input type="hidden" name="resend_form" value="true">
                        <input type="hidden" name="entry_id" value=${data}>
                        <button type="submit">Reenviar Formulario</button>
                        </form>`
            },
        },
    ],
    layout: {
        topStart: {
            buttons: ['pageLength', 'excel', 'csv']
        }
    },
    responsive: {
        details: {
            type: 'column'
        }
    },
    columns: [
        {title: ''}, // 0
        {title: 'Fecha de creación'}, // 1
        {title: 'Certificación'}, // 2
        {title: 'Razón Social'},  //3
        {title: 'Nombre y apellidos'}, //4
        {title: 'Correo electrónico'}, //5
        {title: '¿Es Cliente de AENOR?'}, //6
        {title: 'A. DATOS DE LA EMPRESA QUE SOLICITA LA OFERTA:'}, //7
        {title: '¿Única razón social?:'}, //8
        {title: 'Grupo:'}, //9
        {title: 'Identificación fiscal:'}, //10
        {title: 'Domicilio social:'}, //11
        {title: 'C.P :'}, //12
        {title: 'Población:'}, //13
        {title: 'Provincia:'}, //14
        {title: 'País:'}, //15
        {title: 'Nº de personas empleadas:'}, //16
        {title: 'B. DATOS DE CONTACTO PARA ENVÍO DE LA OFERTA:'}, //17
        {title: 'Nombre de la persona de contacto:'}, //18
        {title: 'Apellidos:'}, //19
        {title: 'Cargo:'}, //20
        {title: 'País:'}, //21
        {title: 'Teléfono:'}, //22
        {title: 'Email:'}, //23
        {title: 'C. ORGANIZACIÓN A CERTIFICAR / INSPECCIONAR:'}, //24
        {title: 'Rellenar solo en caso de que no cocincida con la empresa que solicita la oferta:'}, //25
        {title: 'Provincia:'}, //26
        {title: 'País:'}, //27
        {title: 'INFORMACIÓN ADICIONAL PARA PRESTARLE UN MEJOR SERVICIO'}, //28
        {title: 'Fechas en las que se desearía (opcional):'}, //29 QUITADO
        {title: 'Recibir la oferta:'}, //30
        {title: 'Realizar la auditoría:'}, //31
        {title: '¿Dispone de algún tipo de certificación?:'}, //32
        {title: 'Indique el nombre de la certificación y el organismo:'}, //33
        {title: '¿Desea que utilicemos técnicas de Auditoría Asistidas por Ordenador?:'}, //34
        {title: 'AENOR INTERNACIONAL:'}, //35
        {title: 'He leído y acepto la <a href="https://www.aenor.com/politica-de-privacidad" target="_blank" style="color: blue;">POLÍTICA DE PRIVACIDAD</a>:'}, //36
        {title: 'Doy mi consentimiento para recibir información sobre actividades, productos y servicios relacionados con AENOR:'}, //37
        {title: ''}, //38
    ]
    });
 
// Refilter the table
// document.querySelectorAll('#min, #max').forEach((el) => {
//     el.addEventListener('change', () => table.draw());
// });
</script>
<style>
    body{
        font-family: "Open Sans", sans-serif;
    }
    .dt-layout-row:not(.dt-layout-table){
        width: 33%;
        /* padding-left: 190px; */
    }
    .dt-end{
        text-align: center !important;
    }
    .dt-datetime:not(input){
        position: absolute;
        z-index: 10;
        background: white;
        border: 1px solid black;
        padding: 10px;
    }
    .dt-datetime-iconLeft{
        display:none !important;
    }
    .dt-datetime-iconRight{
        display:none !important;
    }
    .dt-datetime-label{
        display: flex;
        justify-content: space-evenly;
        margin-top: 11px;
    }
    .dtr-title{
        font-weight:bold;
    }
    .dt-type-numeric.dtr-control{
        cursor: pointer;
    }
    .dtr-control::before{
        height: 1em;
        width: 1em;
        margin-top: 3px;
        display: block;
        color: white;
        border: 0.15em solid white;
        border-radius: 1em;
        box-shadow: 0 0 0.2em #444;
        box-sizing: content-box;
        text-align: center;
        text-indent: 0 !important;
        font-family: "Open Sans", sans-serif;
        line-height: 1em;
        content: "+";
        background-color: #31b131;
    }
    .dtr-expanded .dtr-control::before{
        content: "-";
        background-color: #d33333;
    }
    .dtr-control.dt-type-numeric.dt-orderable-none{
        opacity: 0;
    }
    .dt-column-title{
        font-weight: bold;
        color: #1F56A2;
    }
    tbody{
        color: #2255A1;
    }
    .child button{
        margin-top: 10px;
        border: 1px solid #0170B9;
        color: #ffffff;
        border-color: #0170B9;
        background-color: #0170B9;
        padding-top: 10px;
        padding-right: 25px;
        padding-bottom: 10px;
        padding-left: 25px;
        line-height: 1em;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }
    .child button:hover{
        background-color: gray;
        background-color: #d5d5d5;
        color: black;
    }
    table.dataTable td {
    white-space: normal !important;
    }
    button.dt-datetime-button.dt-datetime-day {
    width: 45px;
    height: 35px;
    background: #0170B9;
    color: white;
    cursor: pointer;
    }
    /* PARA CLIENTES AENOR, CAMPOS A NO MOSTRAR:  */
    .cliente-aenor.dtr-expanded  + .child [data-dtr-index="8"]{
        display:none;
    }
    .cliente-aenor.dtr-expanded  + .child [data-dtr-index="9"]{
        display:none;
    }
    .cliente-aenor.dtr-expanded  + .child [data-dtr-index="10"]{
        display:none;
    }
    .cliente-aenor.dtr-expanded  + .child [data-dtr-index="11"]{
        display:none;
    }
    .cliente-aenor.dtr-expanded  + .child [data-dtr-index="12"]{
        display:none;
    }
    .cliente-aenor.dtr-expanded  + .child [data-dtr-index="13"]{
        display:none;
    }
    .cliente-aenor.dtr-expanded  + .child [data-dtr-index="16"]{
        display:none;
    }
    .cliente-aenor.dtr-expanded  + .child [data-dtr-index="20"]{
        display:none;
    }
    .cliente-aenor.dtr-expanded  + .child [data-dtr-index="22"]{
        display:none;
    }
    .cliente-aenor.dtr-expanded  + .child [data-dtr-index="32"]{
        display:none;
    }
    .cliente-aenor.dtr-expanded  + .child [data-dtr-index="33"]{
        display:none;
    }
</style>