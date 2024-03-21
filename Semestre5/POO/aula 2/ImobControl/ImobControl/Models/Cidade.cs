using System;
using System.ComponentModel.DataAnnotations;

namespace ImobControl.Models
{
    public class Cidade
    {
        [Key]
        public Guid Id { get; set; }

        [Required(ErrorMessage = "É Obrigatorio")]
        public string Nome { get; set; }

        [Required(ErrorMessage = "É Obrigatorio"),
            StringLength(2,
            MinimumLength = 2,
            ErrorMessage = "Obrigatorio informar 2 caracteres")]
        public string EstadoSigla { get; set; }

        // Relacionamento entity framework
        public Estado Estado { get; set; }

    }
}
