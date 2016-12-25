<?php

include_once 'Mantenedores/AsignaturaDAO.php';
include_once 'Mantenedores/Desarrollo_programa_didacticoDAO.php';
include_once 'Mantenedores/DocenteDAO.php';
include_once 'Mantenedores/Grupo_electivoDAO.php';
include_once 'Mantenedores/MallaDAO.php';
include_once 'Mantenedores/PerfilDAO.php';
include_once 'Mantenedores/Permiso_usuarioDAO.php';
include_once 'Mantenedores/PrerrequisitoDAO.php';
include_once 'Mantenedores/Programa_basicoDAO.php';
include_once 'Mantenedores/Programa_didacticoDAO.php';
include_once 'Mantenedores/Programa_extensoDAO.php';
include_once 'Mantenedores/Resultado_aprendizajeDAO.php';
include_once 'Mantenedores/Tipo_asignaturaDAO.php';
include_once 'Mantenedores/UsuarioDAO.php';

class Contenedor {

    private static $instancia = NULL;
    private $asignaturaDAO;
    private $desarrollo_programa_didacticoDAO;
    private $docenteDAO;
    private $grupo_electivoDAO;
    private $mallaDAO;
    private $perfilDAO;
    private $permiso_usuarioDAO;
    private $prerrequisitoDAO;
    private $programa_basicoDAO;
    private $programa_didacticoDAO;
    private $programa_extensoDAO;
    private $resultado_aprendizajeDAO;
    private $tipo_asignaturaDAO;
    private $usuarioDAO;

    public function Contenedor() {
        $this->asignaturaDAO = new AsignaturaDAO();
        $this->desarrollo_programa_didacticoDAO = new Desarrollo_programa_didacticoDAO();
        $this->docenteDAO = new DocenteDAO();
        $this->grupo_electivoDAO = new Grupo_electivoDAO();
        $this->mallaDAO = new MallaDAO();
        $this->perfilDAO = new PerfilDAO();
        $this->permiso_usuarioDAO = new Permiso_usuarioDAO();
        $this->prerrequisitoDAO = new PrerrequisitoDAO();
        $this->programa_basicoDAO = new Programa_basicoDAO();
        $this->programa_didacticoDAO = new Programa_didacticoDAO();
        $this->programa_extensoDAO = new Programa_extensoDAO();
        $this->resultado_aprendizajeDAO = new Resultado_aprendizajeDAO();
        $this->tipo_asignaturaDAO = new Tipo_asignaturaDAO();
        $this->usuarioDAO = new UsuarioDAO();
    }

    public static function getInstancia() {
        if (self::$instancia == NULL) {
            self::$instancia = new Contenedor();
        }
        return self::$instancia;
    }

    public function getAllAsignaturas() {
        return $this->asignaturaDAO->findAll();
    }

    public function getAllAsignaturasBy_m_id($m_id) {
        return $this->asignaturaDAO->findAllBy_m_id($m_id);
    }

    public function getAllAsignaturasBy_usu_rut($usu_rut) {
        return $this->asignaturaDAO->findAllBy_usu_rut($usu_rut);
    }

    public function getAllElectivosBy_m_id($m_id) {
        return $this->asignaturaDAO->findAllElectivosBy_m_id($m_id);
    }

    public function getAllElectivosBy_usu_rut($usu_rut) {
        return $this->asignaturaDAO->findAllElectivosBy_usu_rut($usu_rut);
    }

    public function getAllPosiblesPrerrequisitos($m_id, $asig_periodo) {
        return $this->asignaturaDAO->findAllPosiblesPrerrequisitos($m_id, $asig_periodo);
    }

    public function addAsignatura($asignatura) {
        return $this->asignaturaDAO->save($asignatura);
    }

    public function removeAsignatura($asig_codigo) {
        return $this->asignaturaDAO->delete($asig_codigo);
    }

    public function updateAsignatura($asignatura) {
        return $this->asignaturaDAO->update($asignatura);
    }

    public function getAsignaturaByID($asig_codigo) {
        return $this->asignaturaDAO->findByID($asig_codigo);
    }

    public function getAsignaturasByM_Id($m_id) {
        return $this->asignaturaDAO->findByM_ID($m_id);
    }

    public function getAsignaturaLikeAtrr($cadena) {
        return $this->asignaturaDAO->findLikeAtrr($cadena);
    }
    
    public function getAsignaturasAndProgramaBasicoByM_id_And_asig_periodo($m_id,$n_semestre) {
        return $this->asignaturaDAO->findAsigAndProgBasicoByM_id_And_asig_periodo($m_id,$n_semestre);
    }

    public function getAllDesarrollo_programa_didacticos() {
        return $this->desarrollo_programa_didacticoDAO->findAll();
    }

    public function addDesarrollo_programa_didactico($desarrollo_programa_didactico) {
        return $this->desarrollo_programa_didacticoDAO->save($desarrollo_programa_didactico);
    }

    public function removeDesarrollo_programa_didactico($dpd_id) {
        return $this->desarrollo_programa_didacticoDAO->delete($dpd_id);
    }

    public function removePrograma_didacticoBorradorBy_pe_id($pe_id) {
        return $this->desarrollo_programa_didacticoDAO->delete_BorradorBy_pe_id($pe_id);
    }

    public function updateDesarrollo_programa_didactico($desarrollo_programa_didactico) {
        return $this->desarrollo_programa_didacticoDAO->update($desarrollo_programa_didactico);
    }

    public function getDesarrollo_programa_didacticoByID($dpd_id) {
        return $this->desarrollo_programa_didacticoDAO->findByID($dpd_id);
    }

    public function getDesarrollo_programa_didacticoBy_pd_id($pd_id) {
        return $this->desarrollo_programa_didacticoDAO->findBy_pd_id($pd_id);
    }

    public function getDesarrollo_programa_didacticoLikeAtrr($cadena) {
        return $this->desarrollo_programa_didacticoDAO->findLikeAtrr($cadena);
    }

    public function getAllDocentes() {
        return $this->docenteDAO->findAll();
    }

    public function addDocente($docente) {
        return $this->docenteDAO->save($docente);
    }

    public function removeDocente($doc_id) {
        return $this->docenteDAO->delete($doc_id);
    }

    public function removeDocenteByUsu_Rut_Asig_Codigo($usu_rut, $asig_codigo) {
        return $this->docenteDAO->deleteByUsu_Rut_Asig_Codigo($usu_rut, $asig_codigo);
    }

    public function removeDocenteBy_Asig_codigo($asig_codigo) {
        return $this->docenteDAO->deleteByAsig_Codigo($asig_codigo);
    }

    public function updateDocente($docente) {
        return $this->docenteDAO->update($docente);
    }

    public function getDocenteByID($doc_id) {
        return $this->docenteDAO->findByID($doc_id);
    }

    public function getDocenteByAsig_codigo($asig_codigo) {
        return $this->docenteDAO->findByAsig_codigo($asig_codigo);
    }

    public function getDocenteLikeAtrr($cadena) {
        return $this->docenteDAO->findLikeAtrr($cadena);
    }

    public function getAllGrupo_electivos() {
        return $this->grupo_electivoDAO->findAll();
    }

    public function addGrupo_electivo($grupo_electivo) {
        return $this->grupo_electivoDAO->save($grupo_electivo);
    }

    public function removeGrupo_electivo($ge_codigo) {
        return $this->grupo_electivoDAO->delete($ge_codigo);
    }

    public function updateGrupo_electivo($grupo_electivo) {
        return $this->grupo_electivoDAO->update($grupo_electivo);
    }

    public function getGrupo_electivoByID($ge_codigo) {
        return $this->grupo_electivoDAO->findByID($ge_codigo);
    }

    public function getGrupo_electivoByM_Id($m_id) {
        return $this->grupo_electivoDAO->findByM_ID($m_id);
    }

    public function getGrupo_electivoLikeAtrr($cadena) {
        return $this->grupo_electivoDAO->findLikeAtrr($cadena);
    }

    public function getAllMallas() {
        return $this->mallaDAO->findAll();
    }

    public function addMalla($malla) {
        return $this->mallaDAO->save($malla);
    }

    public function removeMalla($m_id) {
        return $this->mallaDAO->delete($m_id);
    }

    public function updateMalla($malla) {
        return $this->mallaDAO->update($malla);
    }

    public function getMallaByID($m_id) {
        return $this->mallaDAO->findByID($m_id);
    }

    public function getMallaLikeAtrr($cadena) {
        return $this->mallaDAO->findLikeAtrr($cadena);
    }

    public function cantidadMaximaAsignaturasEnSemestreByMalla($m_id) {
        return $this->mallaDAO->cantidadMaximaAsignaturasEnSemestre($m_id);
    }

    public function maxPeriodoUtilizadoByM_Id($m_id) {
        return $this->mallaDAO->maxPeriodoUtilizadoByM_Id($m_id);
    }

    public function getAllPerfils() {
        return $this->perfilDAO->findAll();
    }

    public function addPerfil($perfil) {
        return $this->perfilDAO->save($perfil);
    }

    public function removePerfil($per_id) {
        return $this->perfilDAO->delete($per_id);
    }

    public function updatePerfil($perfil) {
        return $this->perfilDAO->update($perfil);
    }

    public function getPerfilByID($per_id) {
        return $this->perfilDAO->findByID($per_id);
    }

    public function getPerfilLikeAtrr($cadena) {
        return $this->perfilDAO->findLikeAtrr($cadena);
    }

    public function getAllPermiso_usuarios() {
        return $this->permiso_usuarioDAO->findAll();
    }

    public function addPermiso_usuario($permiso_usuario) {
        return $this->permiso_usuarioDAO->save($permiso_usuario);
    }

    public function removePermiso_usuario($usu_rut) {
        return $this->permiso_usuarioDAO->delete($usu_rut);
    }

    public function updatePermiso_usuario($permiso_usuario) {
        return $this->permiso_usuarioDAO->update($permiso_usuario);
    }

    public function getPermiso_usuarioByID($usu_rut) {
        return $this->permiso_usuarioDAO->findByID($usu_rut);
    }

    public function getPermiso_usuarioLikeAtrr($cadena) {
        return $this->permiso_usuarioDAO->findLikeAtrr($cadena);
    }

    public function getAllPrerrequisitos() {
        return $this->prerrequisitoDAO->findAll();
    }

    public function getAllPrerrequisitosByAsig_Codigo($asig_codigo) {
        return $this->prerrequisitoDAO->findAllbyAsig_codigo($asig_codigo);
    }

    public function getAllPrerrequisitosByAsig_Codigo_Prerrequisito($asig_codigo_prerrequisito) {
        return $this->prerrequisitoDAO->findAllbyAsig_codigo_prerrequisito($asig_codigo_prerrequisito);
    }

    public function addPrerrequisito($prerrequisito) {
        return $this->prerrequisitoDAO->save($prerrequisito);
    }

    public function removePrerrequisito($pre_id) {
        return $this->prerrequisitoDAO->delete($pre_id);
    }

    public function removePrerrequisitoByAsig_Codigo($asig_codigo) {
        return $this->prerrequisitoDAO->deleteByAsig_Codigo($asig_codigo);
    }

    public function removePrerrequisitoByAsig_Codigo_Asig_Codigo_Prerrequisito($asig_codigo, $asig_codigo_prerrequisito) {
        return $this->prerrequisitoDAO->deleteByAsig_Codigo_Asig_Codigo_Prerrequisito($asig_codigo, $asig_codigo_prerrequisito);
    }

    public function updatePrerrequisito($prerrequisito) {
        return $this->prerrequisitoDAO->update($prerrequisito);
    }

    public function getPrerrequisitoByID($pre_id) {
        return $this->prerrequisitoDAO->findByID($pre_id);
    }

    public function getPrerrequisitoLikeAtrr($cadena) {
        return $this->prerrequisitoDAO->findLikeAtrr($cadena);
    }

    public function getAllPerrequisitosByAsig_Codigo($asig_codigo) {
        return $this->prerrequisitoDAO->findAllPrerrequisitos_ByAsig_Codigo($asig_codigo);
    }

    public function getAllCorrequisitosByAsig_Codigo($asig_codigo) {
        return $this->prerrequisitoDAO->findAllCorrequisitos_ByAsig_Codigo($asig_codigo);
    }

    public function getIdDisponible_programa_basico() {
        return $this->programa_basicoDAO->getIdDisponible();
    }

    public function getAllPrograma_basicos() {
        return $this->programa_basicoDAO->findAll();
    }

    public function addPrograma_basico($programa_basico) {
        return $this->programa_basicoDAO->save($programa_basico);
    }

    public function removePrograma_basico($pb_id) {
        return $this->programa_basicoDAO->delete($pb_id);
    }

    public function removePrograma_basicoBorradorByAsigCodigo($asig_codigo) {
        return $this->programa_basicoDAO->deleteBorradorByAsigCodigo($asig_codigo);
    }

    public function updatePrograma_basico($programa_basico) {
        return $this->programa_basicoDAO->update($programa_basico);
    }

    public function getPrograma_basicoByID($pb_id) {
        return $this->programa_basicoDAO->findByID($pb_id);
    }

    public function getPrograma_basicosByAsig_Codigo($asig_codigo) {
        return $this->programa_basicoDAO->findByAsig_Codigo($asig_codigo);
    }

    public function getPrograma_basicos_version_final_ByAsig_Codigo($asig_codigo) {
        return $this->programa_basicoDAO->find_version_final_ByAsig_Codigo($asig_codigo);
    }
    
    public function getPrograma_basicos_aprobados_By_m_id_and_periodo($m_id, $fechaInicio, $fechaTermino) {
        return $this->programa_basicoDAO->findByM_id_And_Periodo_Aprobados($m_id, $fechaInicio, $fechaTermino);
    }

    public function getPrograma_basicoLikeAtrr($cadena) {
        return $this->programa_basicoDAO->findLikeAtrr($cadena);
    }

    public function getId_disponible_programa_didatico() {
        return $this->programa_didacticoDAO->getId_disponible();
    }

    public function getAllPrograma_didacticos() {
        return $this->programa_didacticoDAO->findAll();
    }
    
    public function getAllPrograma_didacticos_by_estado($estado) {
        return $this->programa_didacticoDAO->findAll_by_estado($estado);
    }

    public function addPrograma_didactico($programa_didactico) {
        return $this->programa_didacticoDAO->save($programa_didactico);
    }

    public function removePrograma_didactico($pd_id) {
        return $this->programa_didacticoDAO->delete($pd_id);
    }

    public function updatePrograma_didactico($programa_didactico) {
        return $this->programa_didacticoDAO->update($programa_didactico);
    }

    public function getPrograma_didacticoByID($pd_id) {
        return $this->programa_didacticoDAO->findByID($pd_id);
    }

    public function getPrograma_didacticoByPE_ID($pe_id) {
        return $this->programa_didacticoDAO->findByPE_ID($pe_id);
    }

    public function getPrograma_didacticoByPE_ID_AND_ESTADO($pe_id, $estado) {
        return $this->programa_didacticoDAO->findByPE_ID_AND_ESTADO($pe_id, $estado);
    }
    
    public function getPrograma_didacticos_aprobados_By_m_id_and_periodo($m_id, $m_fechaInicio, $m_fechaFin) {
        return $this->programa_didacticoDAO->find_aprobados_By_m_id_and_periodo($m_id, $m_fechaInicio, $m_fechaFin);
    }

    public function getPrograma_didactico_version_final_ByAsig_Codigo($asig_codigo) {
        return $this->programa_didacticoDAO->find_version_final_ByAsig_Codigo($asig_codigo);
    }

    public function getPrograma_didacticoLikeAtrr($cadena) {
        return $this->programa_didacticoDAO->findLikeAtrr($cadena);
    }

    public function getId_disponible_programa_extenso() {
        return $this->programa_extensoDAO->id_disponible();
    }

    public function getAllPrograma_extensos() {
        return $this->programa_extensoDAO->findAll();
    }

    public function getAllPrograma_extensos_by_estado($estado) {
        return $this->programa_extensoDAO->findAll_by_estado($estado);
    }

    public function addPrograma_extenso($programa_extenso) {
        return $this->programa_extensoDAO->save($programa_extenso);
    }

    public function removePrograma_extenso($pe_id) {
        return $this->programa_extensoDAO->delete($pe_id);
    }

    public function removePrograma_extensoBorradorByAsigCodigo($asig_codigo) {
        return $this->programa_extensoDAO->deleteBorradorByAsigCodigo($asig_codigo);
    }

    public function updatePrograma_extenso($programa_extenso) {
        return $this->programa_extensoDAO->update($programa_extenso);
    }

    public function getPrograma_extensoByID($pe_id) {
        return $this->programa_extensoDAO->findByID($pe_id);
    }

    public function getPrograma_extensosByAsig_Codigo($asig_codigo) {
        return $this->programa_extensoDAO->findByAsig_Codigo($asig_codigo);
    }

    public function getPrograma_extensosByAsig_Codigo_And_Estado($asig_codigo, $estado) {
        return $this->programa_extensoDAO->findByAsig_Codigo_And_Estado($asig_codigo, $estado);
    }
    
    public function getPrograma_extensos_aprobados_By_m_id_and_periodo($m_id, $m_fechaInicio, $m_fechaFin) {
        return $this->programa_extensoDAO->find_aprobados_By_M_id_and_periodo($m_id, $m_fechaInicio, $m_fechaFin);
    }

    public function getPrograma_extensos_version_final_ByAsig_Codigo($asig_codigo) {
        return $this->programa_extensoDAO->find_version_final_ByAsig_Codigo($asig_codigo);
    }

    public function getPrograma_extensoLikeAtrr($cadena) {
        return $this->programa_extensoDAO->findLikeAtrr($cadena);
    }

    public function getAllResultado_aprendizajes() {
        return $this->resultado_aprendizajeDAO->findAll();
    }

    public function getAllResultado_aprendizajes_By_pe_id($pe_id) {
        return $this->resultado_aprendizajeDAO->findAllBy_pe_id($pe_id);
    }

    public function addResultado_aprendizaje($resultado_aprendizaje) {
        return $this->resultado_aprendizajeDAO->save($resultado_aprendizaje);
    }

    public function removeResultado_aprendizaje($ra_id) {
        return $this->resultado_aprendizajeDAO->delete($ra_id);
    }

    public function updateResultado_aprendizaje($resultado_aprendizaje) {
        return $this->resultado_aprendizajeDAO->update($resultado_aprendizaje);
    }

    public function getResultado_aprendizajeByID($ra_id) {
        return $this->resultado_aprendizajeDAO->findByID($ra_id);
    }

    public function getResultado_aprendizajeLikeAtrr($cadena) {
        return $this->resultado_aprendizajeDAO->findLikeAtrr($cadena);
    }

    public function getAllTipo_asignaturas() {
        return $this->tipo_asignaturaDAO->findAll();
    }

    public function addTipo_asignatura($tipo_asignatura) {
        return $this->tipo_asignaturaDAO->save($tipo_asignatura);
    }

    public function removeTipo_asignatura($ta_id) {
        return $this->tipo_asignaturaDAO->delete($ta_id);
    }

    public function updateTipo_asignatura($tipo_asignatura) {
        return $this->tipo_asignaturaDAO->update($tipo_asignatura);
    }

    public function getTipo_asignaturaByID($ta_id) {
        return $this->tipo_asignaturaDAO->findByID($ta_id);
    }

    public function getTipo_asignaturaLikeAtrr($cadena) {
        return $this->tipo_asignaturaDAO->findLikeAtrr($cadena);
    }

    public function getAllUsuarios() {
        return $this->usuarioDAO->findAll();
    }

    public function addUsuario($usuario) {
        return $this->usuarioDAO->save($usuario);
    }

    public function removeUsuario($usu_rut) {
        return $this->usuarioDAO->delete($usu_rut);
    }

    public function updateUsuario($usuario) {
        return $this->usuarioDAO->update($usuario);
    }

    public function getUsuarioByID($usu_rut) {
        return $this->usuarioDAO->findByID($usu_rut);
    }

    public function getUsuarioLikeAtrr($cadena) {
        return $this->usuarioDAO->findLikeAtrr($cadena);
    }

}

?>