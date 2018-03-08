'use strict';

/*blokowanie wyświetlania w iframe*/
if (top.location != self.location) {
    top.location.href = self.location;
}
