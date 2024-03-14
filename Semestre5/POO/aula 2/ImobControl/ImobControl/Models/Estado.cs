using System.ComponentModel.DataAnnotations;

namespace ImobControl.Models
{
    public class Estado
    {

        [Key, 
         StringLength(2,
            MinimumLength =2,
            ErrorMessage ="Obrigatorio informar 2 caracteres")]
        public string Sigla{ get; set; }
        
        [Required(ErrorMessage ="É obrigatorio")]
        public string Nome { get; set; }


    }
}
