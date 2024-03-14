using ImobControl.Models;
using Microsoft.EntityFrameworkCore;

namespace ImobControl.Data
{
    public class ImobControlContext : DbContext
    {
        public ImobControlContext(DbContextOptions<ImobControlContext> options) : base(options) { } 

        public DbSet<Estado> Estado { get; set; }
    }
}
