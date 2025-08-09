#!/bin/bash

#########################################################################
#                          Container Entrypoint                         #
#########################################################################

# --------------------------------------------------------------------- #
#    --== Adding Execution Permission To DB Conatiner Scripts ==--      #
# --------------------------------------------------------------------- #

chmod +x /DATABASE/scripts/configure_mysql.sh
chmod +x /DATABASE/scripts/configure_dummy_data.sh
chmod +x /DATABASE/scripts/configure_flags.sh

# --------------------------------------------------------------------- #
#                   --== Starting Mysql Server ==--                     #
# --------------------------------------------------------------------- #

service mysql start

# --------------------------------------------------------------------- #
#          --== Executiing DB Conatiner Configuration Scripts ==--      #
# --------------------------------------------------------------------- #

bash /DATABASE/scripts/configure_mysql.sh
bash /DATABASE/scripts/configure_dummy_data.sh
bash /DATABASE/scripts/configure_flags.sh

# --------------------------------------------------------------------- #
#                       --== Keep The Container ==--                    #
# --------------------------------------------------------------------- #

tail -f /dev/null
