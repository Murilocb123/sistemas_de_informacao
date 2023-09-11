// component_utils.js
const utils = ()=> {
    /**
     * Função reposnsavel por retornar o conteudo do componente no path de quem a chamou
     */

    function getComponenteContent() {
        return fetch('./index.html').then((response) => {
        return response.text();
    });
    }
    return {
        getComponenteContent: getComponenteContent
    }

}

export default utils;