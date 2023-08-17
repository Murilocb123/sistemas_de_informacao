
import components from './components/config.js';

/**
 * controller responsavel por carregar os componentes em tela
 */
function loadComponents() {
    console.log(components);
    console.log(components);
    setComponent();
}

/**
 *
 */

function setComponent() {
    for (const key in components) {
        if (components.hasOwnProperty(key)) {
            const componentElement = document.querySelector('component_' + key);
            
            if (componentElement) {
                // Criação do componente (supondo que o retorno de components[key]() seja um elemento válido)
                const component = components[key]();
                
                const wrapperElement = document.createElement('div');
                
                // Define o conteúdo do elemento usando a string do componente
                wrapperElement.innerHTML = component;
                
                // Limpa o conteúdo do elemento antes de adicionar o componente
                componentElement.innerHTML = '';
                
                // Adiciona o componente em tela
                componentElement.appendChild(wrapperElement);
            }
        }
    }

}

document.onload = loadComponents();