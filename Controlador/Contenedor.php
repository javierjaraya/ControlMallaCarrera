<?php

include_once 'Mantenedores/AsignaturaDAO.php';
include_once 'Mantenedores/DocenteDAO.php';
include_once 'Mantenedores/Grupo_electivoDAO.php';
include_once 'Mantenedores/MallaDAO.php';
include_once 'Mantenedores/PerfilDAO.php';
include_once 'Mantenedores/Permiso_usuarioDAO.php';
include_once 'Mantenedores/PrerrequisitoDAO.php';
include_once 'Mantenedores/Tipo_asignaturaDAO.php';
include_once 'Mantenedores/UsuarioDAO.php';

class Contenedor {
    private static $instancia = NULL;
    private $asignaturaDAO;
    private $docenteDAO;
    private $grupo_electivoDAO;
    private $mallaDAO;
    private $perfilDAO;
    private $permiso_usuarioDAO;
    private $prerrequisitoDAO;
    private $tipo_asignaturaDAO;
    private $usuarioDAO;

    public function Contenedor() {
        $this->asignaturaDAO = new AsignaturaDAO();
        $this->docenteDAO = new DocenteDAO();
        $this->grupo_electivoDAO = new Grupo_electivoDAO();
        $this->mallaDAO = new MallaDAO();
        $this->perfilDAO = new PerfilDAO();
        $this->permiso_usuarioDAO = new Permiso_usuarioDAO();
        $this->prerrequisitoDAO = new PrerrequisitoDAO();
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

    public function getAsignaturasByM_Id($m_id){
        return $this->asignaturaDAO->findByM_ID($m_id);
    }

    public function getAsignaturaLikeAtrr($cadena) {
        return $this->asignaturaDAO->findLikeAtrr($cadena);
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
    
    public function removeDocenteBy_Asig_codigo($asig_codigo) {
        return $this->docenteDAO->deleteByAsig_Codigo($asig_codigo);
    }

    public function updateDocente($docente) {
        return $this->docenteDAO->update($docente);
    }

    public function getDocenteByID($doc_id) {
        return $this->docenteDAO->findByID($doc_id);
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
    
    public function getGrupo_electivoByM_Id($m_id){
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
    
    public function cantidadMaximaAsignaturasEnSemestreByMalla($m_id){
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
    
    public function removePrerrequisitoByAsig_Codigo_Asig_Codigo_Prerrequisito($asig_codigo,$asig_codigo_prerrequisito) {
        return $this->prerrequisitoDAO->deleteByAsig_Codigo_Asig_Codigo_Prerrequisito($asig_codigo,$asig_codigo_prerrequisito);
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